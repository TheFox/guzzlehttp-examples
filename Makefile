
RM = rm -rfd
CHMOD = chmod
VENDOR = vendor
COMPOSER = ./composer.phar
COMPOSER_OPTIONS ?= --no-interaction

PHONY: all
all: install

.PHONY: install
install: v1/$(VENDOR) v2/$(VENDOR) v3/$(VENDOR) v4/$(VENDOR) v5/$(VENDOR) v6/$(VENDOR)

.PHONY: clean
clean:
	$(RM) $(COMPOSER) v*/composer.lock v*/$(VENDOR)

v%/$(VENDOR): $(COMPOSER)
	$(COMPOSER) install -d $(shell dirname $@) $(COMPOSER_OPTIONS)

$(COMPOSER):
	curl -sS https://getcomposer.org/installer | php
	$(CHMOD) u=rwx,go=rx $(COMPOSER)

.PHONY: test
test: | v1/$(VENDOR) v2/$(VENDOR) v3/$(VENDOR) v4/$(VENDOR) v5/$(VENDOR) v6/$(VENDOR)
	php v1/get.php
	php v1/post.php
	php v2/get.php
	php v2/post.php
	php v3/get.php
	php v3/post.php
	php v4/get.php
	php v4/post.php
	php v5/get.php
	php v5/post.php
	php v6/get.php
	php v6/post.php
