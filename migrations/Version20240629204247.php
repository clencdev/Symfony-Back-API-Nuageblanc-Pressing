<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240629204247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD city_id_id INT DEFAULT NULL, ADD zipid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404553CCE3900 FOREIGN KEY (city_id_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455F4D83F8C FOREIGN KEY (zipid_id) REFERENCES zip (id)');
        $this->addSql('CREATE INDEX IDX_C74404553CCE3900 ON client (city_id_id)');
        $this->addSql('CREATE INDEX IDX_C7440455F4D83F8C ON client (zipid_id)');
        $this->addSql('ALTER TABLE `order` ADD order_detail_id_id INT DEFAULT NULL, ADD client_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398674C164 FOREIGN KEY (order_detail_id_id) REFERENCES order_detail (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_F5299398674C164 ON `order` (order_detail_id_id)');
        $this->addSql('CREATE INDEX IDX_F5299398DC2902E0 ON `order` (client_id_id)');
        $this->addSql('ALTER TABLE order_detail ADD service_item_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_detail ADD CONSTRAINT FK_ED896F46C3B2BC33 FOREIGN KEY (service_item_id_id) REFERENCES service_item (id)');
        $this->addSql('CREATE INDEX IDX_ED896F46C3B2BC33 ON order_detail (service_item_id_id)');
        $this->addSql('ALTER TABLE service_item ADD service_id_id INT DEFAULT NULL, ADD item_id_id INT DEFAULT NULL, ADD category_id_id INT DEFAULT NULL, ADD sous_categorie_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE service_item ADD CONSTRAINT FK_D15891F2D63673B0 FOREIGN KEY (service_id_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service_item ADD CONSTRAINT FK_D15891F255E38587 FOREIGN KEY (item_id_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE service_item ADD CONSTRAINT FK_D15891F29777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE service_item ADD CONSTRAINT FK_D15891F2464D3EEB FOREIGN KEY (sous_categorie_id_id) REFERENCES sous_categorie (id)');
        $this->addSql('CREATE INDEX IDX_D15891F2D63673B0 ON service_item (service_id_id)');
        $this->addSql('CREATE INDEX IDX_D15891F255E38587 ON service_item (item_id_id)');
        $this->addSql('CREATE INDEX IDX_D15891F29777D11E ON service_item (category_id_id)');
        $this->addSql('CREATE INDEX IDX_D15891F2464D3EEB ON service_item (sous_categorie_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404553CCE3900');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455F4D83F8C');
        $this->addSql('DROP INDEX IDX_C74404553CCE3900 ON client');
        $this->addSql('DROP INDEX IDX_C7440455F4D83F8C ON client');
        $this->addSql('ALTER TABLE client DROP city_id_id, DROP zipid_id');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398674C164');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398DC2902E0');
        $this->addSql('DROP INDEX IDX_F5299398674C164 ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398DC2902E0 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP order_detail_id_id, DROP client_id_id');
        $this->addSql('ALTER TABLE order_detail DROP FOREIGN KEY FK_ED896F46C3B2BC33');
        $this->addSql('DROP INDEX IDX_ED896F46C3B2BC33 ON order_detail');
        $this->addSql('ALTER TABLE order_detail DROP service_item_id_id');
        $this->addSql('ALTER TABLE service_item DROP FOREIGN KEY FK_D15891F2D63673B0');
        $this->addSql('ALTER TABLE service_item DROP FOREIGN KEY FK_D15891F255E38587');
        $this->addSql('ALTER TABLE service_item DROP FOREIGN KEY FK_D15891F29777D11E');
        $this->addSql('ALTER TABLE service_item DROP FOREIGN KEY FK_D15891F2464D3EEB');
        $this->addSql('DROP INDEX IDX_D15891F2D63673B0 ON service_item');
        $this->addSql('DROP INDEX IDX_D15891F255E38587 ON service_item');
        $this->addSql('DROP INDEX IDX_D15891F29777D11E ON service_item');
        $this->addSql('DROP INDEX IDX_D15891F2464D3EEB ON service_item');
        $this->addSql('ALTER TABLE service_item DROP service_id_id, DROP item_id_id, DROP category_id_id, DROP sous_categorie_id_id');
    }
}
