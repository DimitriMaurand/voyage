<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502141349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, telephone INT NOT NULL, prenom VARCHAR(75) NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage_image (voyage_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_CFAD38B068C9E5AF (voyage_id), INDEX IDX_CFAD38B03DA5256D (image_id), PRIMARY KEY(voyage_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage_categorie (voyage_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_7B84F8AA68C9E5AF (voyage_id), INDEX IDX_7B84F8AABCF5E72D (categorie_id), PRIMARY KEY(voyage_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage_pays (voyage_id INT NOT NULL, pays_id INT NOT NULL, INDEX IDX_A40DF42068C9E5AF (voyage_id), INDEX IDX_A40DF420A6E44244 (pays_id), PRIMARY KEY(voyage_id, pays_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage_ile (voyage_id INT NOT NULL, ile_id INT NOT NULL, INDEX IDX_610287CE68C9E5AF (voyage_id), INDEX IDX_610287CE57037E6E (ile_id), PRIMARY KEY(voyage_id, ile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE voyage_image ADD CONSTRAINT FK_CFAD38B068C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_image ADD CONSTRAINT FK_CFAD38B03DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_categorie ADD CONSTRAINT FK_7B84F8AA68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_categorie ADD CONSTRAINT FK_7B84F8AABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_pays ADD CONSTRAINT FK_A40DF42068C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_pays ADD CONSTRAINT FK_A40DF420A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_ile ADD CONSTRAINT FK_610287CE68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage_ile ADD CONSTRAINT FK_610287CE57037E6E FOREIGN KEY (ile_id) REFERENCES ile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD user_id INT DEFAULT NULL, ADD statut_id INT DEFAULT NULL, ADD voyage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F6203804 FOREIGN KEY (statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495568C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('CREATE INDEX IDX_42C84955A76ED395 ON reservation (user_id)');
        $this->addSql('CREATE INDEX IDX_42C84955F6203804 ON reservation (statut_id)');
        $this->addSql('CREATE INDEX IDX_42C8495568C9E5AF ON reservation (voyage_id)');
        $this->addSql('ALTER TABLE voyage ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3F9D8955A76ED395 ON voyage (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955A76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE voyage_image DROP FOREIGN KEY FK_CFAD38B068C9E5AF');
        $this->addSql('ALTER TABLE voyage_image DROP FOREIGN KEY FK_CFAD38B03DA5256D');
        $this->addSql('ALTER TABLE voyage_categorie DROP FOREIGN KEY FK_7B84F8AA68C9E5AF');
        $this->addSql('ALTER TABLE voyage_categorie DROP FOREIGN KEY FK_7B84F8AABCF5E72D');
        $this->addSql('ALTER TABLE voyage_pays DROP FOREIGN KEY FK_A40DF42068C9E5AF');
        $this->addSql('ALTER TABLE voyage_pays DROP FOREIGN KEY FK_A40DF420A6E44244');
        $this->addSql('ALTER TABLE voyage_ile DROP FOREIGN KEY FK_610287CE68C9E5AF');
        $this->addSql('ALTER TABLE voyage_ile DROP FOREIGN KEY FK_610287CE57037E6E');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voyage_image');
        $this->addSql('DROP TABLE voyage_categorie');
        $this->addSql('DROP TABLE voyage_pays');
        $this->addSql('DROP TABLE voyage_ile');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F6203804');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495568C9E5AF');
        $this->addSql('DROP INDEX IDX_42C84955A76ED395 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955F6203804 ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495568C9E5AF ON reservation');
        $this->addSql('ALTER TABLE reservation DROP user_id, DROP statut_id, DROP voyage_id');
        $this->addSql('DROP INDEX IDX_3F9D8955A76ED395 ON voyage');
        $this->addSql('ALTER TABLE voyage DROP user_id');
    }
}
