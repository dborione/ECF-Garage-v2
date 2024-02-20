
## Environnement de développement

### Pré-requis

* PHP 8.0.17
* Composer
* Symfony CLI
* Docker
* Docker-compose
--> Verifier les pré-requis:

```bash
symfony check: requirements
```

### Lancer l'environnement de développement

```bash
docker-compose up -d
symfony serve -d
```

```bash
composer require doctrine/doctrine-bundle 
```
--> installe docker en meme temps

### Fixtures
admin: email admin@test.com, password admin123
employé: email emp@test.com, password emp123


