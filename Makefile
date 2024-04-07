.PHONY: version
version:
	-@docker compose run --rm debug php -v
	-@docker compose run --rm debug composer --version
	-@docker compose run --rm debug vendor/bin/phpmd --version
	-@docker compose run --rm debug vendor/bin/phpunit --version
	-@docker compose run --rm debug vendor/bin/pest --version
	-@docker compose run --rm debug vendor/bin/php-cs-fixer --version
	-@docker compose run --rm debug vendor/bin/phpstan --version

.PHONY: test
test:
	@echo "Running tests.."
	-@docker compose run --rm debug vendor/bin/pest tests

.PHONY: analyze
analyze:
	@echo "Running analyze.."
	@echo "[Format]"
	-@docker compose run --rm debug vendor/bin/php-cs-fixer fix --dry-run --diff
	@echo "[Cyclomatic complexity check]"
	-@docker compose run --rm debug composer phpmd
	@echo "[Type check]"
	-@docker compose run --rm debug vendor/bin/phpstan analyse src tests
