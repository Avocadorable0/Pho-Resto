--
-- PostgreSQL database dump
--

-- Dumped from database version 14.9
-- Dumped by pg_dump version 14.9

-- Started on 2024-06-18 16:24:06

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 215 (class 1259 OID 66364)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: Pho
--


--
-- TOC entry 219 (class 1259 OID 66388)
-- Name: ingredients; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.ingredients (
    id bigint NOT NULL,
    "ingredientNom" character varying(255) NOT NULL,
    "ingredientImg" character varying(255) NOT NULL,
    "ingredientPrixGramme" double precision NOT NULL,
    "ingredientCalorieGramme" double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);



CREATE SEQUENCE public.ingredients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;




ALTER SEQUENCE public.ingredients_id_seq OWNED BY public.ingredients.id;


--
-- TOC entry 223 (class 1259 OID 66419)
-- Name: ingredients_plats_view; Type: VIEW; Schema: public; Owner: Pho
--

CREATE VIEW public.ingredients_plats_view AS
SELECT
    NULL::bigint AS id,
    NULL::character varying(255) AS "platNom",
    NULL::character varying(255) AS "platImg",
    NULL::integer AS "ingredientsId",
    NULL::character varying(255) AS "ingredientNom",
    NULL::double precision AS quantite,
    NULL::double precision AS prix,
    NULL::double precision AS calorie,
    NULL::double precision AS totalcalorie,
    NULL::double precision AS totalprix;



CREATE TABLE public.menu (
    id bigint NOT NULL,
    "menuNom" character varying(255) NOT NULL,
    "menuDate" date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);



CREATE SEQUENCE public.menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



ALTER SEQUENCE public.menu_id_seq OWNED BY public.menu.id;


--
-- TOC entry 232 (class 1259 OID 66516)
-- Name: menu_plat; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.menu_plat (
    "menuId" integer NOT NULL,
    "platId" integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

CREATE TABLE public.menu_plat_compose (
    "menuId" integer NOT NULL,
    "platComposeId" integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);



--entry 3438 (class 0 OID 0)
-- Dependencies: 209
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Pho


--



--
-- TOC entry 3439 (class 0 OID 0)
-- Dependencies: 216
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Pho
--

--
-- TOC entry 221 (class 1259 OID 66397)
-- Name: plats; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.plats (
    id bigint NOT NULL,
    "platNom" character varying(255) NOT NULL,
    "platImg" character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--lass 1259 OID 66406)
-- Name: plats__ingredients_plats; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.plats__ingredients_plats (
    "ingredientsPlatsId" integer NOT NULL,
    "ingredientsId" integer NOT NULL,
    "ingredientGramme" double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


-- TOC entry 225 (class 1259 OID 66455)
-- Name: plats_compose; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.plats_compose (
    id bigint NOT NULL,
    "platComposeNom" character varying(255) NOT NULL,
    "platComposeImg" character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


--y 224 (class 1259 OID 66454)
-- Name: plats_compose_id_seq; Type: SEQUENCE; Schema: public; Owner: Pho
--

CREATE SEQUENCE public.plats_compose_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--OC entry 3440 (class 0 OID 0)
-- Dependencies: 224
-- Name: plats_compose_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Pho
--

ALTER SEQUENCE public.plats_compose_id_seq OWNED BY public.plats_compose.id;


--
-- TOC entry 227 (class 1259 OID 66466)
-- Name: plats_compose_ingredient; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.plats_compose_ingredient (
    "platComposeId" integer NOT NULL,
    "ingredientId" integer NOT NULL,
    "ingredientGramme" double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


-- TOC entry 226 (class 1259 OID 66463)
-- Name: plats_compose_plat; Type: TABLE; Schema: public; Owner: Pho
--

CREATE TABLE public.plats_compose_plat (
    "platComposeId" integer NOT NULL,
    "platId" integer NOT NULL,
    quantite integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


 --entry 220 (class 1259 OID 66396)
-- Name: plats_id_seq; Type: SEQUENCE; Schema: public; Owner: Pho
--

CREATE SEQUENCE public.plats_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


 --3441 (class 0 OID 0)
-- Dependencies: 220
-- Name: plats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Pho
--

ALTER SEQUENCE public.plats_id_seq OWNED BY public.plats.id;


--
-- TOC entry 212 (class 1259 OID 66346)
-- Name: users; Type: TABLE; Schema: public; Owner: Pho
--

 --3442 (class 0 OID 0)
-- Dependencies: 211
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Pho
--

--
-- TOC entry 236 (class 1259 OID 66559)
-- Name: v_menu_plat; Type: VIEW; Schema: public; Owner: Pho
--

CREATE VIEW public.v_menu_plat AS
 SELECT mp."menuId",
    ipv.id,
    ipv."platNom",
    ipv.totalcalorie,
    ipv.totalprix
   FROM (public.menu_plat mp
     JOIN public.ingredients_plats_view ipv ON ((ipv.id = mp."platId")))
  GROUP BY mp."menuId", ipv.id, ipv."platNom", ipv.totalcalorie, ipv.totalprix;


--234 (class 1259 OID 66550)
-- Name: v_plat_compose; Type: VIEW; Schema: public; Owner: Pho
--

CREATE VIEW public.v_plat_compose AS
 SELECT pc.id,
    pc."platComposeNom",
    pc."platComposeImg",
    sum(((v_plat.totalcalorie * (pcp.quantite)::double precision) + ( SELECT sum((i2."ingredientCalorieGramme" * pi2."ingredientGramme")) AS sum
           FROM (public.plats_compose_ingredient pi2
             JOIN public.ingredients i2 ON ((i2.id = pi2."ingredientId")))
          WHERE (pi2."platComposeId" = pc.id)))) AS calorietotal,
    sum(((v_plat.totalprix * (pcp.quantite)::double precision) + ( SELECT sum((i1."ingredientPrixGramme" * pi1."ingredientGramme")) AS sum
           FROM (public.plats_compose_ingredient pi1
             JOIN public.ingredients i1 ON ((i1.id = pi1."ingredientId")))
          WHERE (pi1."platComposeId" = pc.id)))) AS prixplatcompose
   FROM ((public.plats_compose pc
     JOIN public.plats_compose_plat pcp ON ((pcp."platComposeId" = pc.id)))
     JOIN public.ingredients_plats_view v_plat ON ((v_plat.id = pcp."platId")))
  GROUP BY pc.id, pc."platComposeNom", pc."platComposeImg";


--ry 235 (class 1259 OID 66555)
-- Name: v_menu_plat_compose; Type: VIEW; Schema: public; Owner: Pho
--

CREATE VIEW public.v_menu_plat_compose AS
 SELECT mp."menuId",
    vpc.id,
    vpc."platComposeNom",
    vpc.calorietotal,
    vpc.prixplatcompose
   FROM (public.menu_plat_compose mp
     JOIN public.v_plat_compose vpc ON ((vpc.id = mp."platComposeId")));


--C entry 228 (class 1259 OID 66487)
-- Name: v_plat_composition; Type: VIEW; Schema: public; Owner: Pho
--

CREATE VIEW public.v_plat_composition AS
 SELECT pcp."platComposeId",
    pcp."platId",
    p."platNom",
    pcp.quantite
   FROM (public.plats_compose_plat pcp
     JOIN public.plats p ON ((p.id = pcp."platId")));


 --entry 229 (class 1259 OID 66491)
-- Name: v_plat_compositions; Type: VIEW; Schema: public; Owner: Pho
--

CREATE VIEW public.v_plat_compositions AS
 SELECT pci."platComposeId",
    pci."ingredientId",
    i."ingredientNom",
    pci."ingredientGramme"
   FROM (public.plats_compose_ingredient pci
     JOIN public.ingredients i ON ((i.id = pci."ingredientId")));


--C entry 3249 (class 2604 OID 66367)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: Pho
--

--
-- TOC entry 3252 (class 2604 OID 66391)
-- Name: ingredients id; Type: DEFAULT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.ingredients ALTER COLUMN id SET DEFAULT nextval('public.ingredients_id_seq'::regclass);


--
-- TOC entry 3255 (class 2604 OID 66507)
-- Name: menu id; Type: DEFAULT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.menu ALTER COLUMN id SET DEFAULT nextval('public.menu_id_seq'::regclass);


--
-- TOC entry 3247 (class 2604 OID 66241)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: Pho
--
-- TOC entry 3251 (class 2604 OID 66379)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: Pho
--

--
-- TOC entry 3253 (class 2604 OID 66400)
-- Name: plats id; Type: DEFAULT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.plats ALTER COLUMN id SET DEFAULT nextval('public.plats_id_seq'::regclass);


--
-- TOC entry 3254 (class 2604 OID 66458)
-- Name: plats_compose id; Type: DEFAULT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.plats_compose ALTER COLUMN id SET DEFAULT nextval('public.plats_compose_id_seq'::regclass);


--
-- TOC entry 3248 (class 2604 OID 66349)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: Pho
--

--
-- TOC entry 3265 (class 2606 OID 66372)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--
--
-- TOC entry 3267 (class 2606 OID 66374)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: Pho
--
--
-- TOC entry 3274 (class 2606 OID 66395)
-- Name: ingredients ingredients_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.ingredients
    ADD CONSTRAINT ingredients_pkey PRIMARY KEY (id);


--
-- TOC entry 3280 (class 2606 OID 66509)
-- Name: menu menu_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);


--
-- TOC entry 3257 (class 2606 OID 66243)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--

--
-- TOC entry 3263 (class 2606 OID 66362)
-- Name: password_resets password_resets_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--
--
-- TOC entry 3269 (class 2606 OID 66383)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--
--
-- TOC entry 3278 (class 2606 OID 66462)
-- Name: plats_compose plats_compose_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.plats_compose
    ADD CONSTRAINT plats_compose_pkey PRIMARY KEY (id);


--
-- TOC entry 3276 (class 2606 OID 66404)
-- Name: plats plats_pkey; Type: CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.plats
    ADD CONSTRAINT plats_pkey PRIMARY KEY (id);


--
-- TOC entry 3259 (class 2606 OID 66355)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: Pho
--
--
-- TOC entry 3424 (class 2618 OID 66422)
-- Name: ingredients_plats_view _RETURN; Type: RULE; Schema: public; Owner: Pho
--

CREATE OR REPLACE VIEW public.ingredients_plats_view AS
 SELECT p.id,
    p."platNom",
    p."platImg",
    pip."ingredientsId",
    i."ingredientNom",
    pip."ingredientGramme" AS quantite,
    (i."ingredientPrixGramme" * pip."ingredientGramme") AS prix,
    (i."ingredientCalorieGramme" * pip."ingredientGramme") AS calorie,
    ( SELECT sum((i3."ingredientCalorieGramme" * pip3."ingredientGramme")) AS sum
           FROM (public.plats__ingredients_plats pip3
             JOIN public.ingredients i3 ON ((i3.id = pip3."ingredientsId")))
          WHERE (pip3."ingredientsPlatsId" = p.id)) AS totalcalorie,
    ( SELECT sum((i2."ingredientPrixGramme" * pip2."ingredientGramme")) AS sum
           FROM (public.plats__ingredients_plats pip2
             JOIN public.ingredients i2 ON ((i2.id = pip2."ingredientsId")))
          WHERE (pip2."ingredientsPlatsId" = p.id)) AS totalprix
   FROM ((public.plats__ingredients_plats pip
     JOIN public.plats p ON ((p.id = pip."ingredientsPlatsId")))
     JOIN public.ingredients i ON ((i.id = pip."ingredientsId")))
  GROUP BY p.id, p."platNom", pip."ingredientsId", i."ingredientNom", pip."ingredientGramme", i."ingredientPrixGramme", i."ingredientCalorieGramme";


--
-- TOC entry 3283 (class 2606 OID 66540)
-- Name: menu_plat_compose menu_plat_compose_menuid_foreign; Type: FK CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.menu_plat_compose
    ADD CONSTRAINT menu_plat_compose_menuid_foreign FOREIGN KEY ("menuId") REFERENCES public.menu(id);


--
-- TOC entry 3284 (class 2606 OID 66545)
-- Name: menu_plat_compose menu_plat_compose_platcomposeid_foreign; Type: FK CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.menu_plat_compose
    ADD CONSTRAINT menu_plat_compose_platcomposeid_foreign FOREIGN KEY ("platComposeId") REFERENCES public.plats_compose(id);


--
-- TOC entry 3281 (class 2606 OID 66519)
-- Name: menu_plat menu_plat_menuid_foreign; Type: FK CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.menu_plat
    ADD CONSTRAINT menu_plat_menuid_foreign FOREIGN KEY ("menuId") REFERENCES public.menu(id);


--
-- TOC entry 3282 (class 2606 OID 66524)
-- Name: menu_plat menu_plat_platid_foreign; Type: FK CONSTRAINT; Schema: public; Owner: Pho
--

ALTER TABLE ONLY public.menu_plat
    ADD CONSTRAINT menu_plat_platid_foreign FOREIGN KEY ("platId") REFERENCES public.plats(id);


-- Completed on 2024-06-18 16:24:07

--
-- PostgreSQL database dump complete
--

