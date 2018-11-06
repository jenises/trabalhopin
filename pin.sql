CREATE TABLE public.ci_sessions
(
  id character varying(128),
  ip_address character varying(45),
  "timestamp" integer,
  data text
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.ci_sessions
  OWNER TO postgres;
REATE TABLE public.clienteinvest
(
  idclienteinvest integer NOT NULL DEFAULT nextval('clienteinvest_idclienteinvest_seq'::regclass),
  nomecliente character varying(255) NOT NULL,
  sexo character varying(20),
  pessoa_fisica boolean NOT NULL DEFAULT true,
  documento character varying(20) NOT NULL,
  telefone character varying(20) NOT NULL,
  celular character varying(20) DEFAULT NULL::character varying,
  email character varying(100) NOT NULL,
  datacadastro date,
  rua character varying(70) DEFAULT NULL::character varying,
  numero character varying(15) DEFAULT NULL::character varying,
  bairro character varying(45) DEFAULT NULL::character varying,
  cidade character varying(45) DEFAULT NULL::character varying,
  estado character varying(20) DEFAULT NULL::character varying,
  cep character varying(20) DEFAULT NULL::character varying,
  CONSTRAINT clientes_pkey PRIMARY KEY (idclienteinvest)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.clienteinvest
  OWNER TO postgres;
