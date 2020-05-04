--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

-- Started on 2020-05-04 14:48:32

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

DROP DATABASE mathbase;
--
-- TOC entry 2843 (class 1262 OID 16673)
-- Name: mathbase; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE mathbase WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'German_Germany.1252' LC_CTYPE = 'German_Germany.1252';


ALTER DATABASE mathbase OWNER TO postgres;

\connect mathbase

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

--
-- TOC entry 206 (class 1255 OID 16791)
-- Name: update_updated_at_exercise(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.update_updated_at_exercise() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
begin 
	new.updated_at = new();
	return new;
end;
$$;


ALTER FUNCTION public.update_updated_at_exercise() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 205 (class 1259 OID 16775)
-- Name: exercise; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.exercise (
    id integer NOT NULL,
    user_id integer NOT NULL,
    description text NOT NULL,
    solution character varying(255) NOT NULL,
    created_at timestamp without time zone DEFAULT now(),
    updated_at timestamp without time zone DEFAULT now()
);


ALTER TABLE public.exercise OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16773)
-- Name: exercise_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.exercise_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.exercise_id_seq OWNER TO postgres;

--
-- TOC entry 2844 (class 0 OID 0)
-- Dependencies: 204
-- Name: exercise_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.exercise_id_seq OWNED BY public.exercise.id;


--
-- TOC entry 203 (class 1259 OID 16764)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    picture character varying(255)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16762)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2845 (class 0 OID 0)
-- Dependencies: 202
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 2697 (class 2604 OID 16778)
-- Name: exercise id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exercise ALTER COLUMN id SET DEFAULT nextval('public.exercise_id_seq'::regclass);


--
-- TOC entry 2696 (class 2604 OID 16767)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2837 (class 0 OID 16775)
-- Dependencies: 205
-- Data for Name: exercise; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2835 (class 0 OID 16764)
-- Dependencies: 203
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2846 (class 0 OID 0)
-- Dependencies: 204
-- Name: exercise_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.exercise_id_seq', 1, false);


--
-- TOC entry 2847 (class 0 OID 0)
-- Dependencies: 202
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 2705 (class 2606 OID 16785)
-- Name: exercise exercise_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exercise
    ADD CONSTRAINT exercise_pkey PRIMARY KEY (id);


--
-- TOC entry 2703 (class 2606 OID 16772)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2700 (class 1259 OID 16794)
-- Name: email; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX email ON public.users USING btree (email);


--
-- TOC entry 2706 (class 1259 OID 16792)
-- Name: user_id; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX user_id ON public.exercise USING btree (user_id);


--
-- TOC entry 2701 (class 1259 OID 16793)
-- Name: username; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX username ON public.users USING btree (username);


--
-- TOC entry 2707 (class 2606 OID 16786)
-- Name: exercise exercise_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exercise
    ADD CONSTRAINT exercise_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);


-- Completed on 2020-05-04 14:48:32

--
-- PostgreSQL database dump complete
--

