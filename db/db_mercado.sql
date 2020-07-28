--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: tb_categoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tb_categoria (
    id_categoria integer NOT NULL,
    categoria character varying(40) NOT NULL,
    imposto character varying(40) NOT NULL
);


ALTER TABLE public.tb_categoria OWNER TO postgres;

--
-- Name: tb_categoria_id_categoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_categoria_id_categoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_categoria_id_categoria_seq OWNER TO postgres;

--
-- Name: tb_categoria_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_categoria_id_categoria_seq OWNED BY public.tb_categoria.id_categoria;


--
-- Name: tb_produto; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE public.tb_produto (
    id_produto integer NOT NULL,
    id_categoria integer NOT NULL,
    nome character varying(40) NOT NULL,
    valor character varying(40) NOT NULL
);


ALTER TABLE public.tb_produto OWNER TO postgres;

--
-- Name: tb_produto_id_produto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_produto_id_produto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tb_produto_id_produto_seq OWNER TO postgres;

--
-- Name: tb_produto_id_produto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_produto_id_produto_seq OWNED BY public.tb_produto.id_produto;


--
-- Name: id_categoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public.tb_categoria_id_categoria_seq'::regclass);


--
-- Name: id_produto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_produto ALTER COLUMN id_produto SET DEFAULT nextval('public.tb_produto_id_produto_seq'::regclass);


--
-- Data for Name: tb_categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_categoria VALUES (413, 'Refrigerante', '44.55');
INSERT INTO public.tb_categoria VALUES (414, 'Água mineral', '37.44');
INSERT INTO public.tb_categoria VALUES (415, 'Cerveja', '42.69');
INSERT INTO public.tb_categoria VALUES (416, 'Salgadinho', '37.30');
INSERT INTO public.tb_categoria VALUES (417, 'Pipoca', '34.99');
INSERT INTO public.tb_categoria VALUES (418, 'Óleo', '22.79');
INSERT INTO public.tb_categoria VALUES (419, 'Mostarda', '40.96');
INSERT INTO public.tb_categoria VALUES (420, 'Margarina', '35.98');
INSERT INTO public.tb_categoria VALUES (421, 'Macarrão', '16.30');
INSERT INTO public.tb_categoria VALUES (422, 'Iogurte', '33.06');
INSERT INTO public.tb_categoria VALUES (423, 'Chocolate', '39.61');
INSERT INTO public.tb_categoria VALUES (424, 'Café', '16.52');
INSERT INTO public.tb_categoria VALUES (425, 'Arroz', '17.24');
INSERT INTO public.tb_categoria VALUES (426, 'Açúcar', '30.60');
INSERT INTO public.tb_categoria VALUES (427, 'Achocolatado', '38.06');


--
-- Name: tb_categoria_id_categoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_categoria_id_categoria_seq', 427, true);


--
-- Data for Name: tb_produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_produto VALUES (44, 413, 'Coca-cola', '7.99');
INSERT INTO public.tb_produto VALUES (45, 413, 'Fanta', '6.99');
INSERT INTO public.tb_produto VALUES (46, 414, 'Vila Nova', '1.99');
INSERT INTO public.tb_produto VALUES (47, 415, 'Brahma', '2.75');
INSERT INTO public.tb_produto VALUES (48, 415, 'Skol', '2.70');
INSERT INTO public.tb_produto VALUES (49, 416, 'Cheetos', '6.90');
INSERT INTO public.tb_produto VALUES (50, 416, 'Ruffles', '8.50');
INSERT INTO public.tb_produto VALUES (51, 417, 'Yoki', '3.69');
INSERT INTO public.tb_produto VALUES (52, 418, 'Soya', '4.90');
INSERT INTO public.tb_produto VALUES (53, 419, 'Hemmer', '4.90');
INSERT INTO public.tb_produto VALUES (54, 419, 'Heinz', '6.90');
INSERT INTO public.tb_produto VALUES (55, 420, 'Doriana', '4.90');
INSERT INTO public.tb_produto VALUES (56, 420, 'Qualy', '4.60');
INSERT INTO public.tb_produto VALUES (57, 421, 'Isabela', '3.50');
INSERT INTO public.tb_produto VALUES (58, 421, 'Galo', '2.90');
INSERT INTO public.tb_produto VALUES (59, 422, 'Batavo', '4.90');
INSERT INTO public.tb_produto VALUES (60, 423, 'Lacta', '4.90');
INSERT INTO public.tb_produto VALUES (61, 423, 'Nestlé', '5.90');
INSERT INTO public.tb_produto VALUES (62, 424, 'Bom Jesus', '7.99');
INSERT INTO public.tb_produto VALUES (63, 424, 'Melita', '10.90');
INSERT INTO public.tb_produto VALUES (64, 425, 'Tio João', '3.90');
INSERT INTO public.tb_produto VALUES (65, 425, 'Tio Urbano', '3.50');
INSERT INTO public.tb_produto VALUES (66, 426, 'União', '3.70');
INSERT INTO public.tb_produto VALUES (67, 427, 'Nescau', '6.90');
INSERT INTO public.tb_produto VALUES (68, 427, 'Toddy', '6.99');


--
-- Name: tb_produto_id_produto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_produto_id_produto_seq', 68, true);


--
-- Name: categoria_uk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tb_categoria
    ADD CONSTRAINT categoria_uk UNIQUE (categoria);


--
-- Name: produto_uk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tb_produto
    ADD CONSTRAINT produto_uk UNIQUE (nome);


--
-- Name: tb_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tb_categoria
    ADD CONSTRAINT tb_categoria_pkey PRIMARY KEY (id_categoria);


--
-- Name: tb_produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY public.tb_produto
    ADD CONSTRAINT tb_produto_pkey PRIMARY KEY (id_produto);


--
-- Name: fk_categoria; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_produto
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.tb_categoria(id_categoria);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

