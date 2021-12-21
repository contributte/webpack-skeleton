############################################################
# PROJECT ##################################################
############################################################
.PHONY: project install setup clean

project: install setup

install:
	composer install
	npm install

setup:
	mkdir -p var/{tmp,log}
	chmod +0777 var/{tmp,log}

clean:
	find var/tmp -mindepth 1 ! -name '.gitignore' -type f -or -type d -exec rm -rf {} +
	find var/log -mindepth 1 ! -name '.gitignore' -type f -or -type d -exec rm -rf {} +

############################################################
# DEVELOPMENT ##############################################
############################################################
.PHONY: qa dev cs csf phpstan tests coverage dev webpack build

qa: cs phpstan

cs:
	vendor/bin/codesniffer app

csf:
	vendor/bin/codefixer app

phpstan:
	vendor/bin/phpstan analyse -c phpstan.neon --memory-limit=512M app

tests:
	echo "OK"

coverage:
	echo "OK"

dev:
	NETTE_DEBUG=1 NETTE_ENV=dev php -S 0.0.0.0:8000 -t www

webpack:
	npm run dev

build:
	npm run build

############################################################
# DEPLOYMENT ###############################################
############################################################
.PHONY: deploy

deploy: project build
