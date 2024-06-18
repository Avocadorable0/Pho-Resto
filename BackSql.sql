PGDMP     9    )                |            Resto    14.9    14.9 Y    ~           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    66236    Resto    DATABASE     g   CREATE DATABASE "Resto" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'French_Madagascar.1252';
    DROP DATABASE "Resto";
                Pho    false            �           0    0    DATABASE "Resto"    ACL     �   REVOKE ALL ON DATABASE "Resto" FROM "Pho";
GRANT CREATE,CONNECT ON DATABASE "Resto" TO "Pho";
GRANT TEMPORARY ON DATABASE "Resto" TO "Pho" WITH GRANT OPTION;
                   Pho    false    3457            �            1259    66364    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    Pho    false            �            1259    66363    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          Pho    false    215            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          Pho    false    214            �            1259    66388    ingredients    TABLE     s  CREATE TABLE public.ingredients (
    id bigint NOT NULL,
    "ingredientNom" character varying(255) NOT NULL,
    "ingredientImg" character varying(255) NOT NULL,
    "ingredientPrixGramme" double precision NOT NULL,
    "ingredientCalorieGramme" double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.ingredients;
       public         heap    Pho    false            �            1259    66387    ingredients_id_seq    SEQUENCE     {   CREATE SEQUENCE public.ingredients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.ingredients_id_seq;
       public          Pho    false    219            �           0    0    ingredients_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.ingredients_id_seq OWNED BY public.ingredients.id;
          public          Pho    false    218            �            1259    66419    ingredients_plats_view    VIEW     �  CREATE VIEW public.ingredients_plats_view AS
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
 )   DROP VIEW public.ingredients_plats_view;
       public          Pho    false            �            1259    66504    menu    TABLE     �   CREATE TABLE public.menu (
    id bigint NOT NULL,
    "menuNom" character varying(255) NOT NULL,
    "menuDate" date NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.menu;
       public         heap    Pho    false            �            1259    66503    menu_id_seq    SEQUENCE     t   CREATE SEQUENCE public.menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.menu_id_seq;
       public          Pho    false    231            �           0    0    menu_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.menu_id_seq OWNED BY public.menu.id;
          public          Pho    false    230            �            1259    66516 	   menu_plat    TABLE     �   CREATE TABLE public.menu_plat (
    "menuId" integer NOT NULL,
    "platId" integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.menu_plat;
       public         heap    Pho    false            �            1259    66537    menu_plat_compose    TABLE     �   CREATE TABLE public.menu_plat_compose (
    "menuId" integer NOT NULL,
    "platComposeId" integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 %   DROP TABLE public.menu_plat_compose;
       public         heap    Pho    false            �            1259    66238 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    Pho    false            �            1259    66237    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          Pho    false    210            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          Pho    false    209            �            1259    66356    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    Pho    false            �            1259    66376    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    Pho    false            �            1259    66375    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          Pho    false    217            �           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          Pho    false    216            �            1259    66397    plats    TABLE     �   CREATE TABLE public.plats (
    id bigint NOT NULL,
    "platNom" character varying(255) NOT NULL,
    "platImg" character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.plats;
       public         heap    Pho    false            �            1259    66406    plats__ingredients_plats    TABLE       CREATE TABLE public.plats__ingredients_plats (
    "ingredientsPlatsId" integer NOT NULL,
    "ingredientsId" integer NOT NULL,
    "ingredientGramme" double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 ,   DROP TABLE public.plats__ingredients_plats;
       public         heap    Pho    false            �            1259    66455    plats_compose    TABLE       CREATE TABLE public.plats_compose (
    id bigint NOT NULL,
    "platComposeNom" character varying(255) NOT NULL,
    "platComposeImg" character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public.plats_compose;
       public         heap    Pho    false            �            1259    66454    plats_compose_id_seq    SEQUENCE     }   CREATE SEQUENCE public.plats_compose_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.plats_compose_id_seq;
       public          Pho    false    225            �           0    0    plats_compose_id_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.plats_compose_id_seq OWNED BY public.plats_compose.id;
          public          Pho    false    224            �            1259    66466    plats_compose_ingredient    TABLE       CREATE TABLE public.plats_compose_ingredient (
    "platComposeId" integer NOT NULL,
    "ingredientId" integer NOT NULL,
    "ingredientGramme" double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 ,   DROP TABLE public.plats_compose_ingredient;
       public         heap    Pho    false            �            1259    66463    plats_compose_plat    TABLE     �   CREATE TABLE public.plats_compose_plat (
    "platComposeId" integer NOT NULL,
    "platId" integer NOT NULL,
    quantite integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 &   DROP TABLE public.plats_compose_plat;
       public         heap    Pho    false            �            1259    66396    plats_id_seq    SEQUENCE     u   CREATE SEQUENCE public.plats_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.plats_id_seq;
       public          Pho    false    221            �           0    0    plats_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.plats_id_seq OWNED BY public.plats.id;
          public          Pho    false    220            �            1259    66346    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    Pho    false            �            1259    66345    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          Pho    false    212            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          Pho    false    211            �            1259    66559    v_menu_plat    VIEW     4  CREATE VIEW public.v_menu_plat AS
 SELECT mp."menuId",
    ipv.id,
    ipv."platNom",
    ipv.totalcalorie,
    ipv.totalprix
   FROM (public.menu_plat mp
     JOIN public.ingredients_plats_view ipv ON ((ipv.id = mp."platId")))
  GROUP BY mp."menuId", ipv.id, ipv."platNom", ipv.totalcalorie, ipv.totalprix;
    DROP VIEW public.v_menu_plat;
       public          Pho    false    223    232    232    223    223    223            �            1259    66550    v_plat_compose    VIEW       CREATE VIEW public.v_plat_compose AS
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
 !   DROP VIEW public.v_plat_compose;
       public          Pho    false    227    223    223    219    219    219    223    225    225    225    226    226    226    227    227            �            1259    66555    v_menu_plat_compose    VIEW       CREATE VIEW public.v_menu_plat_compose AS
 SELECT mp."menuId",
    vpc.id,
    vpc."platComposeNom",
    vpc.calorietotal,
    vpc.prixplatcompose
   FROM (public.menu_plat_compose mp
     JOIN public.v_plat_compose vpc ON ((vpc.id = mp."platComposeId")));
 &   DROP VIEW public.v_menu_plat_compose;
       public          Pho    false    234    234    234    234    233    233            �            1259    66487    v_plat_composition    VIEW     �   CREATE VIEW public.v_plat_composition AS
 SELECT pcp."platComposeId",
    pcp."platId",
    p."platNom",
    pcp.quantite
   FROM (public.plats_compose_plat pcp
     JOIN public.plats p ON ((p.id = pcp."platId")));
 %   DROP VIEW public.v_plat_composition;
       public          Pho    false    221    221    226    226    226            �            1259    66491    v_plat_compositions    VIEW        CREATE VIEW public.v_plat_compositions AS
 SELECT pci."platComposeId",
    pci."ingredientId",
    i."ingredientNom",
    pci."ingredientGramme"
   FROM (public.plats_compose_ingredient pci
     JOIN public.ingredients i ON ((i.id = pci."ingredientId")));
 &   DROP VIEW public.v_plat_compositions;
       public          Pho    false    227    219    219    227    227            �           2604    66367    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    215    214    215            �           2604    66391    ingredients id    DEFAULT     p   ALTER TABLE ONLY public.ingredients ALTER COLUMN id SET DEFAULT nextval('public.ingredients_id_seq'::regclass);
 =   ALTER TABLE public.ingredients ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    218    219    219            �           2604    66507    menu id    DEFAULT     b   ALTER TABLE ONLY public.menu ALTER COLUMN id SET DEFAULT nextval('public.menu_id_seq'::regclass);
 6   ALTER TABLE public.menu ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    231    230    231            �           2604    66241    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    209    210    210            �           2604    66379    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    216    217    217            �           2604    66400    plats id    DEFAULT     d   ALTER TABLE ONLY public.plats ALTER COLUMN id SET DEFAULT nextval('public.plats_id_seq'::regclass);
 7   ALTER TABLE public.plats ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    220    221    221            �           2604    66458    plats_compose id    DEFAULT     t   ALTER TABLE ONLY public.plats_compose ALTER COLUMN id SET DEFAULT nextval('public.plats_compose_id_seq'::regclass);
 ?   ALTER TABLE public.plats_compose ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    224    225    225            �           2604    66349    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          Pho    false    211    212    212            l          0    66364    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          Pho    false    215   Gx       p          0    66388    ingredients 
   TABLE DATA           �   COPY public.ingredients (id, "ingredientNom", "ingredientImg", "ingredientPrixGramme", "ingredientCalorieGramme", created_at, updated_at) FROM stdin;
    public          Pho    false    219   dx       y          0    66504    menu 
   TABLE DATA           Q   COPY public.menu (id, "menuNom", "menuDate", created_at, updated_at) FROM stdin;
    public          Pho    false    231   �y       z          0    66516 	   menu_plat 
   TABLE DATA           O   COPY public.menu_plat ("menuId", "platId", created_at, updated_at) FROM stdin;
    public          Pho    false    232   @z       {          0    66537    menu_plat_compose 
   TABLE DATA           ^   COPY public.menu_plat_compose ("menuId", "platComposeId", created_at, updated_at) FROM stdin;
    public          Pho    false    233   wz       g          0    66238 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          Pho    false    210   �z       j          0    66356    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          Pho    false    213   y|       n          0    66376    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          Pho    false    217   �|       r          0    66397    plats 
   TABLE DATA           Q   COPY public.plats (id, "platNom", "platImg", created_at, updated_at) FROM stdin;
    public          Pho    false    221   �|       s          0    66406    plats__ingredients_plats 
   TABLE DATA           �   COPY public.plats__ingredients_plats ("ingredientsPlatsId", "ingredientsId", "ingredientGramme", created_at, updated_at) FROM stdin;
    public          Pho    false    222   e}       u          0    66455    plats_compose 
   TABLE DATA           g   COPY public.plats_compose (id, "platComposeNom", "platComposeImg", created_at, updated_at) FROM stdin;
    public          Pho    false    225   �}       w          0    66466    plats_compose_ingredient 
   TABLE DATA              COPY public.plats_compose_ingredient ("platComposeId", "ingredientId", "ingredientGramme", created_at, updated_at) FROM stdin;
    public          Pho    false    227   d~       v          0    66463    plats_compose_plat 
   TABLE DATA           i   COPY public.plats_compose_plat ("platComposeId", "platId", quantite, created_at, updated_at) FROM stdin;
    public          Pho    false    226   �~       i          0    66346    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          Pho    false    212   %       �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          Pho    false    214            �           0    0    ingredients_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.ingredients_id_seq', 18, true);
          public          Pho    false    218            �           0    0    menu_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.menu_id_seq', 21, true);
          public          Pho    false    230            �           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 43, true);
          public          Pho    false    209            �           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          Pho    false    216            �           0    0    plats_compose_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.plats_compose_id_seq', 39, true);
          public          Pho    false    224            �           0    0    plats_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.plats_id_seq', 17, true);
          public          Pho    false    220            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 1, false);
          public          Pho    false    211            �           2606    66372    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            Pho    false    215            �           2606    66374 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            Pho    false    215            �           2606    66395    ingredients ingredients_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.ingredients
    ADD CONSTRAINT ingredients_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.ingredients DROP CONSTRAINT ingredients_pkey;
       public            Pho    false    219            �           2606    66509    menu menu_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.menu
    ADD CONSTRAINT menu_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.menu DROP CONSTRAINT menu_pkey;
       public            Pho    false    231            �           2606    66243    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            Pho    false    210            �           2606    66362 $   password_resets password_resets_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.password_resets
    ADD CONSTRAINT password_resets_pkey PRIMARY KEY (email);
 N   ALTER TABLE ONLY public.password_resets DROP CONSTRAINT password_resets_pkey;
       public            Pho    false    213            �           2606    66383 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            Pho    false    217            �           2606    66386 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            Pho    false    217            �           2606    66462     plats_compose plats_compose_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.plats_compose
    ADD CONSTRAINT plats_compose_pkey PRIMARY KEY (id);
 J   ALTER TABLE ONLY public.plats_compose DROP CONSTRAINT plats_compose_pkey;
       public            Pho    false    225            �           2606    66404    plats plats_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.plats
    ADD CONSTRAINT plats_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.plats DROP CONSTRAINT plats_pkey;
       public            Pho    false    221            �           2606    66355    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            Pho    false    212            �           2606    66353    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            Pho    false    212            �           1259    66384 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            Pho    false    217    217            `           2618    66422    ingredients_plats_view _RETURN    RULE     �  CREATE OR REPLACE VIEW public.ingredients_plats_view AS
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
 �  CREATE OR REPLACE VIEW public.ingredients_plats_view AS
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
       public          Pho    false    222    222    222    3276    221    221    221    219    219    219    219    223            �           2606    66540 2   menu_plat_compose menu_plat_compose_menuid_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.menu_plat_compose
    ADD CONSTRAINT menu_plat_compose_menuid_foreign FOREIGN KEY ("menuId") REFERENCES public.menu(id);
 \   ALTER TABLE ONLY public.menu_plat_compose DROP CONSTRAINT menu_plat_compose_menuid_foreign;
       public          Pho    false    3280    233    231            �           2606    66545 9   menu_plat_compose menu_plat_compose_platcomposeid_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.menu_plat_compose
    ADD CONSTRAINT menu_plat_compose_platcomposeid_foreign FOREIGN KEY ("platComposeId") REFERENCES public.plats_compose(id);
 c   ALTER TABLE ONLY public.menu_plat_compose DROP CONSTRAINT menu_plat_compose_platcomposeid_foreign;
       public          Pho    false    3278    225    233            �           2606    66519 "   menu_plat menu_plat_menuid_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.menu_plat
    ADD CONSTRAINT menu_plat_menuid_foreign FOREIGN KEY ("menuId") REFERENCES public.menu(id);
 L   ALTER TABLE ONLY public.menu_plat DROP CONSTRAINT menu_plat_menuid_foreign;
       public          Pho    false    232    231    3280            �           2606    66524 "   menu_plat menu_plat_platid_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.menu_plat
    ADD CONSTRAINT menu_plat_platid_foreign FOREIGN KEY ("platId") REFERENCES public.plats(id);
 L   ALTER TABLE ONLY public.menu_plat DROP CONSTRAINT menu_plat_platid_foreign;
       public          Pho    false    232    221    3276            l      x������ � �      p   �  x�m��n�@E����l��(�j�j1}�Za�"���65mLμ�L��>GϢ���h՝�_<���Ʈ~Y�e��'��.���[W��a_�a� �� `UF��!�Ǥ���(���(�p�jM4��s��6�^�A���,��CꜾ-���-*ǌS���k��Y����wS#����N��j���U3m&mZ9�O�(�'����䔂`�����K5�zķ��ݎ\�2:�ޗ��|�χ_��~���2dc�=&!���MZ����3�)iW�%�El�y��b���:>�ޖxd2���[:@�*Q�LB,DQ$r��Mr��S��p~)t�8iH66Gsw�3W7���s?+��K���+�`v����Q���� I�'q��      y   1   x�32�.-���4202�50�5��3,-��ͭ���@�\1z\\\ ��      z   '   x�32�44�4202�5 "CK+cK+Clb\1z\\\ �	      {   %   x�32�46�4202�5 "CK+c �*����� �	      g   �  x����n�0�k��T���K%�&ފn
���!$�h#)��όm Q�F	�R��'���^c���8�k�v�
)�Xȯv�~���8�k��9����]d���%����y�����=>{�a�����t�S�c�EM�R
q t���#���c<w��G��OWZ�a�����>%�B�b�,,)�E̓A�����%�M��#m�t�Y�am���rX�ѯ�1�M�����5LQy .�CC���r��}��أ��T�q�������u	ȕX4���B�UB� �
��s����p�'2��Q�t�g�:�����V�����BLeM;tR聹��	�ݲ��4�F�e���ϥ�ӒFXw�3�ߏ�K�Jc�$�J:�B.����}��n����7E,�G�b�������v1 ��P��ۻ�,�H�5߶�9�l¹��� ����W      j      x������ � �      n      x������ � �      r   �   x�m��C0 ��s�}�IK�1����D"م�:F�~��"�O��#ܕ��И����y��Ԫ�wX&+����i�Ƹ��F3T��&=�_"�S���у��\K�Ϩ��8J �VZY��M�,��`��T1��=h?^19b'�`�]Nn��i@�2U7�      s   B   x�34�44�4�4202�5 "sC++SKlb\�������fV�@b`f@�5��qqq �q�      u   �   x�m̹�0 ��}
^@҃�ݸ��%
H�A�Emxz�%��o�i�Q>�1��3tc��T�	򆱸U\�����#��^���sm�J��to�~�F�c��Ki��HP݄mOV�WZ0���|OX��!؏k�e�~�m��s�1�>]2xv!�_�	6�      w   S   x�36�44�4�4202�5 "sC+c+Slb\�@����7�o�.ibie�U��؂��|#+Cc+Sclb ����>F��� �\+�      v   N   x��ʱ�0C�Z���l�N����p�4ܩ�zl0���꽾��4gM�a���(��h�����e���~�s���"�      i      x������ � �     