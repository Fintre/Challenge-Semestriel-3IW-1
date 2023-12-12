SET search_path = public;

-- Base de données : `gfm`
--

-- Structure de la table `categorie`
CREATE TABLE "gfm_categorie" (
  "id" serial NOT NULL,
  "description" varchar(255) NOT NULL,
  "createdAt" timestamp NOT NULL,
  "updatedAt" timestamp  NOT NULL,
  "isDeleted" smallint NOT NULL DEFAULT 0
);

-- Structure de la table `comment`
CREATE TABLE "gfm_comment" (
  "id" serial NOT NULL,
  "commentText" varchar(255) NOT NULL,
  "createdAt" timestamp NOT NULL,
  "updatedAt" timestamp  NOT NULL,
  "user_id" int NOT NULL,
  "post_id" int NOT NULL
);

-- Structure de la table `media`
CREATE TABLE "gfm_media" (
  "id" serial NOT NULL,
  "tag" varchar(15) NOT NULL,
  "filepath" varchar(100) NOT NULL,
  "description" varchar(255) NOT NULL,
  "createdAt" timestamp NOT NULL,
  "updatedAt" timestamp NOT NULL,
  "isDeleted" smallint NOT NULL DEFAULT 0,
  "post_id" int NOT NULL
);

-- Structure de la table `post`
CREATE TABLE "gfm_post" (
  "id" serial NOT NULL,
  "title" varchar(40) NOT NULL,
  "body" text NOT NULL,
  "type" varchar(40) NOT NULL,
  "description" varchar(255) NOT NULL,
  "slug" varchar(20) NOT NULL,
  "published" smallint NOT NULL DEFAULT 0,
  "isDeleted" smallint NOT NULL DEFAULT 0,
  "createdAt" timestamp  NOT NULL,
  "updatedAt" timestamp   NOT NULL,
  "user_id" int NOT NULL,
  "siteSetting_id" int NOT NULL
);

-- Structure de la table `siteSetting`
CREATE TABLE "gfm_siteSetting" (
  "id" serial NOT NULL,
  "clé" int NOT NULL,
  "valeur" varchar(255) NOT NULL,
  "createdAt" timestamp NOT NULL,
  "updatedAt" timestamp   NOT NULL,
  "isDeleted" smallint NOT NULL DEFAULT 0
);

-- Structure de la table `user`
CREATE TABLE "gfm_user" (
  "id" serial NOT NULL,
  "firstname" varchar(25) NOT NULL,
  "lastname" varchar(50) NOT NULL,
  "email" varchar(320) NOT NULL,
  "username" varchar(25) NOT NULL,
  "password" varchar(255) NOT NULL,
  "status" smallint NOT NULL DEFAULT 0,
  "roles" varchar(15) NOT NULL,
  "createdAt" timestamp  NOT NULL,
  "updatedAt" timestamp   NOT NULL
);

-- Index pour les tables déchargées

-- Index pour la table `categorie`
CREATE UNIQUE INDEX "gfm_categorie_pkey" ON "gfm_categorie" ("id");

-- Index pour la table `comment`
CREATE UNIQUE INDEX "gfm_comment_pkey" ON "gfm_comment" ("id");
CREATE INDEX "gfm_comment_user_id" ON "gfm_comment" ("user_id");
CREATE INDEX "gfm_comment_post_id" ON "gfm_comment" ("post_id");

-- Index pour la table `media`
CREATE UNIQUE INDEX "gfm_media_pkey" ON "gfm_media" ("id");
CREATE INDEX "gfm_media_post_id" ON "gfm_media" ("post_id");

-- Index pour la table `post`
CREATE UNIQUE INDEX "gfm_post_pkey" ON "gfm_post" ("id");
CREATE INDEX "gfm_post_user_id" ON "gfm_post" ("user_id");
CREATE INDEX "gfm_post_siteSetting_id" ON "gfm_post" ("siteSetting_id");

-- Index pour la table `siteSetting`
CREATE UNIQUE INDEX "gfm_siteSetting_pkey" ON "gfm_siteSetting" ("id");

-- Index pour la table `user`
CREATE UNIQUE INDEX "gfm_user_pkey" ON "gfm_user" ("id");

-- Contraintes pour les tables déchargées

-- Contraintes pour la table `comment`
ALTER TABLE "gfm_comment"
  ADD CONSTRAINT "gfm_comment_user_fk" FOREIGN KEY ("user_id") REFERENCES "gfm_user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT "gfm_comment_post_fk" FOREIGN KEY ("post_id") REFERENCES "gfm_post" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Contraintes pour la table `media`
ALTER TABLE "gfm_media"
  ADD CONSTRAINT "gfm_media_post_fk" FOREIGN KEY ("post_id") REFERENCES "gfm_post" ("id") ON DELETE NO ACTION ON UPDATE CASCADE;

-- Contraintes pour la table `post`
ALTER TABLE "gfm_post"
  ADD CONSTRAINT "gfm_post_user_fk" FOREIGN KEY ("user_id") REFERENCES "gfm_user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT "gfm_post_siteSetting_fk" FOREIGN KEY ("siteSetting_id") REFERENCES "gfm_siteSetting" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
