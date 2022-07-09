<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709061729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9E104C1D3');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9BB649746');
        $this->addSql('DROP INDEX fk_3535ed9e104c1d3 ON hotel');
        $this->addSql('CREATE INDEX IDX_3535ED9E104C1D3 ON hotel (created_user_id)');
        $this->addSql('DROP INDEX fk_3535ed9bb649746 ON hotel');
        $this->addSql('CREATE INDEX IDX_3535ED9BB649746 ON hotel (updated_user_id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BBB649746');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BE104C1D3');
        $this->addSql('DROP INDEX fk_729f519be104c1d3 ON room');
        $this->addSql('CREATE INDEX IDX_729F519BE104C1D3 ON room (created_user_id)');
        $this->addSql('DROP INDEX fk_729f519bbb649746 ON room');
        $this->addSql('CREATE INDEX IDX_729F519BBB649746 ON room (updated_user_id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BBB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BE104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9E104C1D3');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9BB649746');
        $this->addSql('DROP INDEX idx_3535ed9e104c1d3 ON hotel');
        $this->addSql('CREATE INDEX FK_3535ED9E104C1D3 ON hotel (created_user_id)');
        $this->addSql('DROP INDEX idx_3535ed9bb649746 ON hotel');
        $this->addSql('CREATE INDEX FK_3535ED9BB649746 ON hotel (updated_user_id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9E104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9BB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BE104C1D3');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BBB649746');
        $this->addSql('DROP INDEX idx_729f519be104c1d3 ON room');
        $this->addSql('CREATE INDEX FK_729F519BE104C1D3 ON room (created_user_id)');
        $this->addSql('DROP INDEX idx_729f519bbb649746 ON room');
        $this->addSql('CREATE INDEX FK_729F519BBB649746 ON room (updated_user_id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BE104C1D3 FOREIGN KEY (created_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BBB649746 FOREIGN KEY (updated_user_id) REFERENCES user (id)');
    }
}
