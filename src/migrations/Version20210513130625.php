<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210513130625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX book_unique ON book (title, author)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A18098BC64C19C1 ON library (category)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX book_unique ON `book`');
        $this->addSql('DROP INDEX UNIQ_A18098BC64C19C1 ON `library`');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON `user`');
    }
}
