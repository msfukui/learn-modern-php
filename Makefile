ci: lint stan test

lint:
	-@docker compose exec debug vendor/bin/php-cs-fixer fix --dry-run --diff

fix:
	-@docker compose exec debug vendor/bin/php-cs-fixer fix --diff

md:
	-@docker compose exec debug composer phpmd

stan:
	-@docker compose exec debug vendor/bin/phpstan analyse src tests

test:
	-@docker compose exec debug vendor/bin/pest tests
