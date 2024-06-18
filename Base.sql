create table ingredients(
    ingredientId serial primary key,
    ingredientNom varchar(40),
    ingredeintImg varchar(40),
    ingredeintPrixGramme double,
    ingredeintCalorieGramme double
);

SELECT
p."id",
p."platNom",
p."platImg",
"ingredientsId",
i."ingredientNom",
pip."ingredientGramme" as quantite,
i."ingredientPrixGramme" * pip."ingredientGramme" as prix,
i."ingredientCalorieGramme" * pip."ingredientGramme" as calorie,
(select sum(i3."ingredientCalorieGramme" * pip3."ingredientGramme")
FROM plats__ingredients_plats as pip3
JOIN ingredients as i3 ON i3.id = pip3."ingredientsId"
WHERE pip3."ingredientsPlatsId" = p.id) as totalcalorie,
(SELECT sum(i2."ingredientPrixGramme" * pip2."ingredientGramme")
FROM plats__ingredients_plats as pip2
JOIN ingredients as i2 ON i2.id = pip2."ingredientsId"
WHERE pip2."ingredientsPlatsId" = p.id) as totalprix
FROM
plats__ingredients_plats as pip
JOIN
plats as p ON p.id = pip."ingredientsPlatsId"
JOIN
ingredients as i ON i.id = pip."ingredientsId"
GROUP BY
p."id", p."platNom", "ingredientsId", i."ingredientNom", pip."ingredientGramme", i."ingredientPrixGramme", i."ingredientCalorieGramme"

select id,"platNom","platImg","totalprix" from ingredients_plats_view GROUP by id,"platNom","platImg","totalprix"

SELECT
    pc."id",
    "platComposeNom",
    v_plat."id" as platId,
    v_plat."platNom",
    v_plat."totalcalorie",
    i."id",
    i."ingredientNom",
    i."ingredientCalorieGramme",
    v_plat."totalprix" as prixPlat,
    (SELECT SUM(i1."ingredientCalorieGramme" * pi1."ingredientGramme")
     FROM plats_compose_ingredient as pi1
     JOIN ingredients as i1 ON i1."id" = pi1."ingredientId"
     WHERE pi1."platComposeId" = pc."id") as prixIngredient,
    v_plat."totalprix" + (SELECT SUM(i1."ingredientCalorieGramme" * pi1."ingredientGramme")
                          FROM plats_compose_ingredient as pi1
                          JOIN ingredients as i1 ON i1."id" = pi1."ingredientId"
                          WHERE pi1."platComposeId" = pc."id") as prixPlatCompose
FROM plats_compose as pc
JOIN plats_compose_plat as pcp ON pcp."platComposeId" = pc."id"
JOIN plats_compose_ingredient as pci ON pci."platComposeId" = pc."id"
JOIN ingredients_plats_view as v_plat ON v_plat."id" = pcp."platId"
JOIN ingredients as i ON i."id" = pci."ingredientId";

--v_plat_compose
SELECT
    pc."id",
    "platComposeNom",
    "platComposeImg",
    SUM(v_plat."totalcalorie"*pcp."quantite" + (SELECT SUM(i2."ingredientCalorieGramme" * pi2."ingredientGramme")
                                FROM plats_compose_ingredient as pi2
                                JOIN ingredients as i2 ON i2."id" = pi2."ingredientId"
                                WHERE pi2."platComposeId" = pc."id")) as calorieTotal,
    SUM(v_plat."totalprix"*pcp."quantite" + (SELECT SUM(i1."ingredientPrixGramme" * pi1."ingredientGramme")
                                FROM plats_compose_ingredient as pi1
                                JOIN ingredients as i1 ON i1."id" = pi1."ingredientId"
                                WHERE pi1."platComposeId" = pc."id")) as prixPlatCompose
FROM
    plats_compose as pc
JOIN
    plats_compose_plat as pcp ON pcp."platComposeId" = pc."id"
JOIN
    ingredients_plats_view as v_plat ON v_plat."id" = pcp."platId"
GROUP BY
    pc."id", "platComposeNom", "platComposeImg"


-- v_plat_composition
select 
    pcp."platComposeId",
    pcp."platId",
    p."platNom",
    pcp."quantite"
from plats_compose_plat as pcp
join plats as p on p."id"=pcp."platId"

-- v_palt_compositions
select 
    pci."platComposeId",
    pci."ingredientId",
    i."ingredientNom",
    pci."ingredientGramme"
from plats_compose_ingredient as pci
join ingredients as i on i."id" = pci."ingredientId"

-- v_menu_plat
select 
    mp."menuId",
    ipv."id",
    ipv."platNom",
    ipv."totalcalorie",
    ipv."totalprix"
from menu_plat as mp
join ingredients_plats_view as ipv on ipv."id" = mp."platId"
group by mp."menuId",  ipv."id",ipv."platNom",    ipv."totalcalorie",    ipv."totalprix"


-- v_menu_plat_compose
select 
    mp."menuId",
    vpc."id",
    vpc."platComposeNom",
    vpc."calorietotal",
    vpc."prixplatcompose"
from menu_plat_compose as mp
join v_plat_compose as vpc on vpc."id" = mp."platComposeId"

CREATE TABLE Roplanina(
	ID_ROPLANINA SERIAL PRIMARY KEY,
	NOM VARCHAR(30),
	PLACE INTeger(5)
);






