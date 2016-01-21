-- Suppression des données existantes
DROP SCHEMA IF EXISTS prjtrans CASCADE;
DROP TYPE IF EXISTS STATUT;
CREATE SCHEMA prjtrans;


-- Création des tables
CREATE TABLE prjtrans.t_utilisateur (
	login	VARCHAR(32) NOT NULL,
	pass	VARCHAR(32) NOT NULL,
	CONSTRAINT t_utilisateur_pk PRIMARY KEY(login)
);

CREATE TABLE prjtrans.t_atm (
	login	VARCHAR(32) NOT NULL,
	CONSTRAINT t_atm_pk PRIMARY KEY(login),
	CONSTRAINT t_atm_fk1 FOREIGN KEY(login) REFERENCES prjtrans.t_utilisateur
);

CREATE TABLE prjtrans.t_inscription (
	nom		VARCHAR(60)	NOT NULL,
	mail	VARCHAR(64) NOT NULL,
	date_debut	VARCHAR(128) NOT NULL,
	formation 	VARCHAR(128) NOT NULL,
	genre		VARCHAR(64) NOT NULL,
	elements_principaux VARCHAR(200) NOT NULL DEFAULT '',
	elements_ponctuels	VARCHAR(200) NOT NULL DEFAULT '',
	parentes	VARCHAR(200) NOT NULL,
	site_web	VARCHAR(64) NOT NULL,
	origine		VARCHAR(128) NOT NULL,
	CONSTRAINT t_inscription_pk PRIMARY KEY(nom)
);

CREATE TABLE prjtrans.t_artiste (
	login	VARCHAR(32) NOT NULL,
	nom		VARCHAR(60) NOT NULL,
	CONSTRAINT t_artiste_pk PRIMARY KEY(login),
	CONSTRAINT t_artiste_ak1 UNIQUE(nom),
	CONSTRAINT t_artiste_fk1 FOREIGN KEY(login) REFERENCES prjtrans.t_utilisateur,
	CONSTRAINT t_artiste_fk2 FOREIGN KEY(nom) REFERENCES prjtrans.t_inscription
);

CREATE TABLE prjtrans.t_album (
	id_album	SERIAL NOT NULL,
	artiste 	VARCHAR(32) NOT NULL,
	nom			VARCHAR(32) NOT NULL,
	date_sortie	DATE NOT NULL,
	label	VARCHAR(32) NOT NULL,
	CONSTRAINT t_album_pk PRIMARY KEY(id_album),
	CONSTRAINT t_album_fk1 FOREIGN KEY(artiste) REFERENCES prjtrans.t_inscription
);

CREATE TABLE prjtrans.t_video (
	url		VARCHAR(32) NOT NULL,
	artiste VARCHAR(60) NOT NULL,
	titre	VARCHAR(60) NOT NULL,
	CONSTRAINT t_video_pk PRIMARY KEY(url),
	CONSTRAINT t_video_fk1 FOREIGN KEY(artiste) REFERENCES prjtrans.t_artiste
);

CREATE TABLE prjtrans.t_photo (
	url		VARCHAR(32) NOT NULL,
	artiste VARCHAR(60) NOT NULL,
	titre	VARCHAR(60) NOT NULL,
	CONSTRAINT t_photo_pk PRIMARY KEY(url),
	CONSTRAINT t_photo_fk1 FOREIGN KEY(artiste) REFERENCES prjtrans.t_artiste
);

CREATE TABLE prjtrans.t_salle (
	nom		VARCHAR(60) NOT NULL,
	id_resp	INTEGER NOT NULL,
	adresse VARCHAR(128) NOT NULL,
	ville	VARCHAR(32) NOT NULL,
	code_postal VARCHAR(5) NOT NULL,
	acces_handicap BOOLEAN NOT NULL,
	capacite	INTEGER NOT NULL,
	CONSTRAINT t_salle_pk PRIMARY KEY(nom)
);

CREATE TABLE prjtrans.t_responsable (
	id_resp	SERIAL NOT NULL,
	nom		VARCHAR(60) NOT NULL,
	prenom	VARCHAR(60) NOT NULL,
	mail	VARCHAR(64) NOT NULL,
	tel		VARCHAR(30) NOT NULL,
	CONSTRAINT t_responsable_pk PRIMARY KEY(id_resp)
);

ALTER TABLE prjtrans.t_salle
ADD CONSTRAINT t_salle_fk1 FOREIGN KEY(id_resp) REFERENCES prjtrans.t_responsable;

CREATE TYPE STATUT AS ENUM('en cours', 'acceptée', 'refusée');

CREATE TABLE prjtrans.t_reservation (
	artiste	VARCHAR(60) NOT NULL,
	salle	VARCHAR(60) NOT NULL,
	statut	STATUT NOT NULL,
	date_reservation DATE NOT NULL,
	date_concert DATE NOT NULL,
	heure_debut	INTEGER NOT NULL,
	CONSTRAINT t_reservation_pk PRIMARY KEY(artiste, salle),
	CONSTRAINT t_reservation_fk1 FOREIGN KEY(artiste) REFERENCES prjtrans.t_artiste(nom),
	CONSTRAINT t_reservation_fk2 FOREIGN KEY(salle) REFERENCES prjtrans.t_salle
);

CREATE TABLE prjtrans.t_jalons (
	intitule	VARCHAR(32) NOT NULL,
	date_jalon 	DATE NOT NULL,
	CONSTRAINT t_jalons_pk PRIMARY KEY(intitule)
);


-- Création des vues
CREATE VIEW prjtrans.utilisateur AS (
	SELECT * FROM prjtrans.t_utilisateur
);

CREATE VIEW prjtrans.atm AS (
	SELECT * FROM prjtrans.t_atm
);

CREATE VIEW prjtrans.artiste AS (
	SELECT * FROM prjtrans.t_artiste
);

CREATE VIEW prjtrans.inscription AS (
	SELECT * FROM prjtrans.t_inscription
);

CREATE VIEW prjtrans.album AS (
	SELECT * FROM prjtrans.t_album
);

CREATE VIEW prjtrans.video AS (
	SELECT * FROM prjtrans.t_video
);

CREATE VIEW prjtrans.photo AS (
	SELECT * FROM prjtrans.t_photo
);

CREATE VIEW prjtrans.salle AS (
	SELECT * FROM prjtrans.t_salle
);

CREATE VIEW prjtrans.responsable AS (
	SELECT * FROM prjtrans.t_responsable
);

CREATE VIEW prjtrans.reservation AS (
	SELECT * FROM prjtrans.t_reservation
);

CREATE VIEW prjtrans.jalons AS (
	SELECT * FROM prjtrans.t_jalons
);

-- Importation des données
BEGIN;

COPY prjtrans.t_utilisateur (login, pass) FROM STDIN;
atm	atm
user1	Nam
user2	Mauris
user3	purus,
user4	eu,
user5	Sed
user6	nec
user7	lacus.
user8	sed,
user9	sem,
user10	quis,
user11	In
user12	scelerisque
user13	gravida
user14	vulputate
user15	mus.
user16	ornare,
user17	ullamcorper
user18	Fusce
user19	ligula.
user20	dictum
user21	facilisi.
user22	metus
user23	dolor,
user24	Curabitur
user25	eget
user26	orci,
user27	nibh
user28	magna,
user29	convallis,
user30	arcu
user31	euismod
user32	arcu.
user33	leo.
user34	vitae
user35	felis
user36	dictum.
user37	nibh
user38	in
user39	dictum
user40	Aliquam
user41	sodales
user42	et
user43	Proin
user44	aliquet,
user45	mauris.
user46	sit
user47	convallis
\.

COPY prjtrans.t_inscription (nom, mail, origine, date_debut, formation, genre, parentes, site_web) FROM STDIN;
Alphaat	felis@mipede.co.uk	France	2010	guitare	blues	Leah Lynch,Ivana Alexander,Gail Maynard	alphaat.com
Alsarah & The Nubatones	lectus.Cum.sociis@Aeneaneget.net	Soudan,Etats-Unis	2010 / Alsarah seule : première moitié des années 2000	guitare,chant	soul	Ryder Baldwin	alsarah-&-the-nubatones.com
Andre Bratten	dictum.magna.Ut@nisl.co.uk	Norvège	2013	percussions, basse, chant, guitare	techno	Victor Sullivan,Whilemina Hall	andre-bratten.com
Animal Chuki	nascetur@Sed.com	Pérou	2012	chant,basse,percussions	soul	Adria Lawson,Eugenia Bush	animal-chuki.com
A-Wa	Fusce@arcuimperdiet.ca	Yémen,Israël	2013	guitare,percussions,chant,basse	pop	Xenos Fuller,Germaine Haney,Emmanuel Summers	a-wa.com
Awesome Tapes From Africa	urna.et.arcu@nulla.net	Etats-Unis	2006	percussions,basse,chant	techno	Kelly Colon,Hanae Hicks	awesome-tapes-from-africa.com
Bantam Lyons	cursus.et.magna@eget.org	France	2011 en duo / 2013 en quatuor	basse,chant,percussions	jazz	Jerome Arnold,Keelie Best,Jessamine Wynn	bantam-lyons.com
Barnt + Aguayo	Cum@eleifendnondapibus.edu	Allemagne,Chili	2014 / 2010 pour Barnt / 1998 pour Matias Aguayo	basse,chant,percussions	pop	Regina Sawyer,Noelle Lancaster	barnt-+-aguayo.com
Big Buddha	nulla@Aeneanmassa.net	France	2011	guitare,chant,percussions	techno	Joel Dixon,Leah Juarez,Brandon Decker	big-buddha.com
Bison Bisou	et@Integervitaenibh.ca	France	2011	percussions,guitare,basse	jazz	Shad Mcgee,Mariam Kim,Sade Justice	bison-bisou.com
Black Commando	Nulla.dignissim.Maecenas@sedsem.co.uk	Etats-Unis	2014	guitare	rock	Amelia Snyder,Nola Mcneil,Moses Bauer	black-commando.com
Blutch	nulla.at.sem@orciUt.com	France	2012	basse,guitare,percussions	soul	Andrew Mclean,Cameron Leblanc	blutch.com
Boris Brejcha	erat.neque.non@sit.org	Allemagne	2006	percussions	jazz	Knox Gonzales,Wesley Scott,Paki Jarvis	boris-brejcha.com
Chancha Via Circuito Feat. Miriam Garca	ac.urna@libero.org	Argentine	2006 / 2000 sous le nom de Universildo	basse,chant,percussions	soul	Ivana Carey	chancha-via-circuito-feat--miriam-garca.com
Cie 6ème dimension	a.aliquet@montes.com	France	2005	chant	pop	Malik Duffy,Justine Fleming,Meredith Carson	cie-6ème-dimension.com
Cie Rêvolution	amet.faucibus@necdiamDuis.net	France	2005	percussions	blues	Caldwell Dyer,Adrienne Compton,Dylan Pennington	cie-rêvolution.com
Clap! Clap!	et.ultrices@convallisante.ca	Italie	2013 / 2008 sous le nom de Digi G Alessio / 1999 en tant que saxophoniste de jazz	guitare	rock	Bell Bernard,Tallulah Oliver,Tarik Emerson	clap!-clap!.com
Clarens	magna.Nam.ligula@dictumsapien.edu	France	2012	percussions,guitare,basse,chant	techno	Darius Marsh,Amity Berry	clarens.com
Compact Disk Dummies	Sed.nunc@Etiamgravida.org	Belgique	2010	guitare,basse	pop	Aladdin Joseph,Odysseus Marsh	compact-disk-dummies.com
Cosmo Sheldrake	lorem.lorem@blanditviverra.com	Royaume-Uni	2012 / 2007 avec le groupe Gentle Mytics	guitare,percussions	soul	Maisie Saunders	cosmo-sheldrake.com
Costello	sed.sem@risus.co.uk	France	2007	percussions	rock	Duncan Lloyd,Sydnee Wiley,Rana Mercer	costello.com
Courtney Barnett	Quisque@Fuscedolorquam.edu	Australie	2010	guitare	jazz	Charissa Summers,Camille David,Quail Combs	courtney-barnett.com
Courtship Ritual	gravida.non.sollicitudin@Integervitaenibh.org	Etats-Unis	2013	chant	jazz	Ina Rush,Jason Holt	courtship-ritual.com
Curtis Harding	interdum.Nunc.sollicitudin@eu.ca	Etats-Unis	2013 / 2002 avec Cee-Lo Green	chant,guitare,percussions, basse	techno	Brandon Whitfield,Christopher Carpenter,Tucker Donovan	curtis-harding.com
Dad Rocks!	augue@mauriserateget.edu	Danemark,Islande	2009	percussions	pop	Phyllis French	dad-rocks!.com
Darjeeling Speech	mollis@mauris.net	France	2014 / 2004 avec Micronologie	chant,guitare,basse	rock	Demetrius Watson	darjeeling-speech.com
DBFC	eget.dictum@orcisem.edu	DBFC	2014	basse,guitare	soul	Rylee Walters,Grant Newman	dbfc.com
Dead Obies	fermentum@eu.edu	Canada	2011	chant,percussions,guitare, basse	techno	Brady Butler,Devin Pacheco,Walker Hill	dead-obies.com
Den Sorte Skole	lacus.Mauris.non@dictummagnaUt.edu	Danemark	2003	percussions,chant,basse,guitare	jazz	Gillian Daugherty,Yvonne Newton,Oren Klein	den-sorte-skole.com
Dollkraut	consectetuer@pellentesqueSeddictum.co.uk	Pays-Bas	2007	guitare,percussions	techno	Eric Rodgers	dollkraut.com
Eagles Gift	tempor@necquam.net	France	2013	chant,guitare,percussions	soul	Roanna Carney,Burke Sparks	eagles-gift.com
Fawl	sollicitudin.commodo@porttitor.ca	France	2010	basse	blues	Cassandra Mcguire,Sigourney Rivers,Timothy Dunn	fawl.com
F.E.M.	diam@telluslorem.net	France	2011	chant	soul	Marvin Roth	f-e-m-.com
Fitness	at.pede.Cras@etmagnaPraesent.net	Etats-Unis	2014 / 2008 avec le groupe Mr Dream	percussions	pop	Amal Skinner,Amelia Booth	fitness.com
Forever Pavot	felis.adipiscing.fringilla@ligula.edu	France	2011	chant,guitare	jazz	Madaline Hampton	forever-pavot.com
Fragments	enim.sit.amet@amagnaLorem.co.uk	France	2012	basse	rock	Preston Acosta,Clark Velez,Ria Alford	fragments.com
Frank McWeeny	montes.nascetur.ridiculus@dolorFusce.co.uk	France,Royaume-Uni	2011	chant,basse,guitare, percussions	soul	Rafael Conway,Cassady Cervantes	frank-mcweeny.com
Friend Within	Phasellus.nulla@intempuseu.co.uk	Royaume-Uni	2012	chant,basse,guitare,percussions	pop	Clayton Hawkins,Kitra Bird	friend-within.com
Fumaça Preta	fringilla@IntegerurnaVivamus.co.uk	Pays-Bas,Brésil,Portugal,Royaume-Uni	2011	basse,chant	techno	Dennis Rojas,Stewart Webster,Benedict Valentine	fumaça-preta.com
Fuzeta	consectetuer.euismod@infelis.com	France	2014	percussions,guitare	soul	Raya Barnett	fuzeta.com
Gandi Lake	ornare@Pellentesquetincidunt.net	France	2013	guitare	techno	Diana Hooper,Luke Greene	gandi-lake.com
Grand Blanc	ligula@Pellentesquehabitant.edu	France	2011	percussions	soul	Hedley Glass	grand-blanc.com
I Me Mine	quam.vel.sapien@semperet.net	France	2011	percussions,guitare	soul	Harding Gutierrez,Clare Hewitt,Martena Delgado	i-me-mine.com
Islam Chipsy	a@pedeblanditcongue.org	Egypte	2009 avec 2 batteurs / 2006 en solo	percussions,basse	blues	Shellie Potts,Ashely Kirk	islam-chipsy.com
Jambinai	egestas.nunc.sed@elementum.edu	Corée du Sud	2009	basse,chant	soul	Inga Barr	jambinai.com
Jeanne Added	tristique.pharetra@diam.org	France	2011 en solo / 2002 avec différentes formations	chant,guitare,percussions,basse	blues	Wylie Knox,Shana Carson,Herrod Curry	jeanne-added.com
Joyce Muniz	nisi.Cum.sociis@maurisMorbinon.net	Brésil,Autriche	1999	percussions,guitare,chant,basse	pop	Yolanda Randolph,Kellie Christian	joyce-muniz.com
Joy Squander	mollis@nonnisiAenean.com	France	2013	guitare,chant,percussions	pop	Wylie Mueller,Gavin Sullivan	joy-squander.com
Jungle By Night	adipiscing@Suspendisseacmetus.net	Pays-Bas	2010	guitare,percussions	techno	Madeline Fulton	jungle-by-night.com
Kate Tempest	libero.Proin@orciluctuset.org	Royaume-Uni	2003 sur des scènes ouvertes / 2008 avec le groupe Sound of Rum	chant,basse,percussions	techno	Lillith Rice,Azalia Sparks,Amos Stafford	kate-tempest.com
\.

COPY prjtrans.t_artiste (nom, login) FROM STDIN;
Alphaat	user1
Alsarah & The Nubatones	user2
Andre Bratten	user3
Animal Chuki	user4
A-Wa	user5
Awesome Tapes From Africa	user6
Bantam Lyons	user7
Barnt + Aguayo	user8
Big Buddha	user9
Bison Bisou	user10
Black Commando	user11
Blutch	user12
Boris Brejcha	user13
Chancha Via Circuito Feat. Miriam Garca	user14
Cie 6ème dimension	user15
Cie Rêvolution	user16
Clap! Clap!	user17
Clarens	user18
Compact Disk Dummies	user19
Cosmo Sheldrake	user20
Costello	user21
Courtney Barnett	user22
Courtship Ritual	user23
Curtis Harding	user24
Dad Rocks!	user25
Darjeeling Speech	user26
DBFC	user27
Dead Obies	user28
Den Sorte Skole	user29
Dollkraut	user30
Eagles Gift	user31
Fawl	user32
F.E.M.	user33
Fitness	user34
Forever Pavot	user35
Fragments	user36
Frank McWeeny	user37
Friend Within	user38
Fumaça Preta	user39
Fuzeta	user40
Gandi Lake	user41
Grand Blanc	user42
I Me Mine	user43
Islam Chipsy	user44
Jambinai	user45
Jeanne Added	user46
Joyce Muniz	user47
\.

COPY prjtrans.t_atm FROM STDIN;
atm
\.

COPY prjtrans.t_responsable (id_resp, prenom, nom, mail, tel) FROM STDIN;
1	Amelia	Jackson	eu.odio.tristique@fringillamilacinia.net	04 88 88 74 96
2	Ignacia	Davenport	amet.lorem.semper@non.co.uk	07 44 25 39 62
3	Mufutau	Bird	semper@quis.edu	03 49 07 52 09
4	Moses	Rivera	Quisque.ac.libero@Phasellusat.org	09 00 80 89 73
5	Wyatt	Sloan	montes@tempor.co.uk	04 91 25 21 31
6	Regina	Bright	Nunc.commodo@fringillaestMauris.edu	04 52 98 92 40
7	Finn	Avery	malesuada.vel.convallis@turpisIn.com	05 35 93 79 81
8	Vladimir	Fowler	in.felis@augue.net	08 17 97 71 18
9	Anne	Mcgowan	sem@tristiquenequevenenatis.com	09 76 30 92 33
10	Charles	Calhoun	nisl@estNunclaoreet.edu	04 00 11 98 47
11	Alma	Solis	diam.dictum.sapien@sedturpis.ca	02 19 87 13 10
12	Lareina	Franks	netus.et.malesuada@Duis.org	05 05 91 23 99
13	Beatrice	Faulkner	Mauris@felis.ca	08 09 13 28 86
14	Ila	Watson	vitae.mauris.sit@Suspendisse.net	03 88 85 63 02
15	Macey	Boone	mauris@Etiam.edu	08 22 68 71 76
\.

COPY prjtrans.t_salle (nom, id_resp, adresse, ville, code_postal, acces_handicap, capacite) FROM STDIN;
Aire Libre	1	9012 Tortor Rd.	Saint-Jacques-de-la-Lande	13587	true	80
Espace Bel Air	5	3373 Mollis St.	Saint-Aubin-du-Cormier	20135	false	70
La Carène	6	6424 Cursus St.	Brest	56478	false	60
La Citrouille	12	825-9822 Rhoncus Rd.	Saint Brieuc	55489	true	50
Le Cargö	8	929-3427 Curabitur St.	Caen	10320	false	40
L Echonova	13	142-3155 Nisl Rd.	Vannes	98656	true	30
Coatélan	7	483-2551 Nunc Ave	Morlaix	12045	false	20
Le Fuzz Yon	5	3846 Sem Av.	La Roche sur Yon	78234	true	55
Les Champs Libres	11	2007 Nec Ave	Rennes	35700	false	90
L Etage	4	4265 Hendrerit St.	Rennes	35700	false	73
Le Triangle	14	7942 Quam. Road	Rennes	35700	true	150
Le Vip	8	488-9482 Pede. St.	Saint-Nazaire	56482	true	250
Parc des Expositions - Green Room	1	138-3872 In Road	Bruz	23054	true	480
Parc des Expositions - Hall 3	2	349-2877 Tincidunt Rd.	Bruz	23054	false	300
Parc des Expositions - Hall 4	11	5129 Luctus St.	Bruz	23054	false	365
Parc des Expositions - Hall 8	10	126-3295 Auctor Road	Bruz	23054	true	750
Parc des Expositions - Hall 9	9	698-871 Mollis Ave	Bruz	23054	true	980
Stereolux	6	9077 Nisi Avenue	Nantes	49629	false	1500
Théâtre de Poche	15	824-154 Et St.	Hédé	12035	true	3000
Triangle	15	3035 Dolor. Road	Rennes	35700	true	560
Ubu	3	4147 Aliquet Rd.	Rennes	35700	true	420
\.

COPY prjtrans.t_reservation (artiste, salle, statut, date_reservation, date_concert, heure_debut) FROM STDIN;
A-Wa	Parc des Expositions - Hall 3	acceptée	22/09/2014	05/12/2014	20
A-Wa	Parc des Expositions - Green Room	acceptée	22/09/2014	06/12/2014	19
Alphaat	Coatélan	acceptée	12/10/2014	29/11/2014	18
Alsarah & The Nubatones	Ubu	en cours	15/10/2014	03/12/2014	22
Andre Bratten	Parc des Expositions - Green Room	refusée	03/09/2014	04/12/2014	23
Animal Chuki	Parc des Expositions - Green Room	acceptée	28/09/2014	06/12/2014	20
Awesome Tapes From Africa	Parc des Expositions - Hall 8	acceptée	27/09/2014	06/12/2014	21
Bantam Lyons	Stereolux	acceptée	24/08/2014	20/11/2014	19
Barnt + Aguayo	Parc des Expositions - Hall 9	refusée	14/10/2014	06/12/2014	17
Big Buddha	Parc des Expositions - Hall 3	en cours	04/11/2014	05/12/2014	22
Bison Bisou	L Etage	acceptée	01/09/2014	04/11/2014	20
Black Commando	Ubu	en cours	20/10/2014	07/12/2014	15
Blutch	Parc des Expositions - Hall 9	acceptée	03/11/2014	06/12/2014	18
Boris Brejcha	Parc des Expositions - Hall 9	refusée	16/09/2014	06/12/2014	23
Chancha Via Circuito Feat. Miriam Garca	Ubu	acceptée	31/10/2014	06/12/2014	21
Cie 6ème dimension	Espace Bel Air	acceptée	29/10/2014	28/11/2014	19
Cie Rêvolution	Triangle	en cours	20/10/2014	05/11/2014	20
Clap! Clap!	Parc des Expositions - Hall 8	acceptée	10/10/2014	06/12/2014	16
Clarens	Parc des Expositions - Hall 8	acceptée	22/09/2014	04/12/2014	18
Compact Disk Dummies	Parc des Expositions - Hall 3	en cours	03/11/2014	05/12/2014	21
Cosmo Sheldrake	Parc des Expositions - Hall 3	acceptée	12/09/2014	05/12/2014	23
\.

COPY prjtrans.t_jalons (intitule, date_jalon) FROM STDIN;
limite_reservations	05/11/2014
limite_annulations	20/10/2014
fin_festival	01/01/2015
\.

COMMIT;
