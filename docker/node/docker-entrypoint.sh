#!/bin/sh

# Install node modules
yarn install --no-interaction

exec "$@"