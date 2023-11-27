SET search_path = public;

-- Base de données : `gfm`
--

-- Structure de la table `categorie`
CREATE TABLE "categorie" (
  "id" serial NOT NULL,
  "description" varchar(255) NOT NULL,
  "createdAt" timestamp DEFAULT current_timestamp() NOT NULL,
  "updatedAt" timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp() NOT NULL,
  "isDeleted" smallint NOT NULL DEFAULT 0
);

-- Structure de la table `comment`
CREATE TABLE "comment" (
  "id" serial NOT NULL,
  "commentText" varchar(255) NOT NULL,
  "createdAt" timestamp DEFAULT current_timestamp() NOT NULL,
  "updatedAt" timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp() NOT NULL,
  "user_id" int NOT NULL,
  "post_id" int NOT NULL
);

-- Structure de la table `media`
CREATE TABLE "media" (
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
CREATE TABLE "post" (
  "id" serial NOT NULL,
  "title" varchar(40) NOT NULL,
  "body" text NOT NULL,
  "type" varchar(40) NOT NULL,
  "description" varchar(255) NOT NULL,
  "slug" varchar(20) NOT NULL,
  "published" smallint NOT NULL DEFAULT 0,
  "isDeleted" smallint NOT NULL DEFAULT 0,
  "createdAt" timestamp DEFAULT current_timestamp() NOT NULL,
  "updatedAt" timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp() NOT NULL,
  "user_id" int NOT NULL,
  "siteSetting_id" int NOT NULL
);

-- Structure de la table `siteSetting`
CREATE TABLE "siteSetting" (
  "id" serial NOT NULL,
  "clé" int NOT NULL,
  "valeur" varchar(255) NOT NULL,
  "createdAt" timestamp DEFAULT current_timestamp() NOT NULL,
  "updatedAt" timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp() NOT NULL,
  "isDeleted" smallint NOT NULL DEFAULT 0
);

-- Structure de la table `user`
CREATE TABLE "user" (
  "id" serial NOT NULL,
  "firstname" varchar(25) NOT NULL,
  "lastname" varchar(50) NOT NULL,
  "email" varchar(320) NOT NULL,
  "username" varchar(25) NOT NULL,
  "password" varchar(255) NOT NULL,
  "status" smallint NOT NULL DEFAULT 0,
  "roles" varchar(15) NOT NULL,
  "createdAt" timestamp DEFAULT current_timestamp() NOT NULL,
  "updatedAt" timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp() NOT NULL
);

-- Index pour les tables déchargées

-- Index pour la table `categorie`
CREATE UNIQUE INDEX "categorie_pkey" ON "categorie" ("id");

-- Index pour la table `comment`
CREATE UNIQUE INDEX "comment_pkey" ON "comment" ("id");
CREATE INDEX "comment_user_id" ON "comment" ("user_id");
CREATE INDEX "comment_post_id" ON "comment" ("post_id");

-- Index pour la table `media`
CREATE UNIQUE INDEX "media_pkey" ON "media" ("id");
CREATE INDEX "media_post_id" ON "media" ("post_id");

-- Index pour la table `post`
CREATE UNIQUE INDEX "post_pkey" ON "post" ("id");
CREATE INDEX "post_user_id" ON "post" ("user_id");
CREATE INDEX "post_siteSetting_id" ON "post" ("siteSetting_id");

-- Index pour la table `siteSetting`
CREATE UNIQUE INDEX "siteSetting_pkey" ON "siteSetting" ("id");

-- Index pour la table `user`
CREATE UNIQUE INDEX "user_pkey" ON "user" ("id");

-- Contraintes pour les tables déchargées

-- Contraintes pour la table `comment`
ALTER TABLE "comment"
  ADD CONSTRAINT "comment_user_fk" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT "comment_post_fk" FOREIGN KEY ("post_id") REFERENCES "post" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Contraintes pour la table `media`
ALTER TABLE "media"
  ADD CONSTRAINT "media_post_fk" FOREIGN KEY ("post_id") REFERENCES "post" ("id") ON DELETE NO ACTION ON UPDATE CASCADE;

-- Contraintes pour la table `post`
ALTER TABLE "post"
  ADD CONSTRAINT "post_user_fk" FOREIGN KEY ("user_id") REFERENCES "user" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT "post_siteSetting_fk" FOREIGN KEY ("siteSetting_id") REFERENCES "siteSetting" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
