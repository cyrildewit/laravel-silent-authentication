# Release Notes

All notable changes to `Laravel Silent Authentication` will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [v0.1.1] (2019-10-23)

### Added

- Allow `5.8.*` and `^6.0` of `illuminate/auth`

## [v0.1.0] (2019-02-09)

### Added

- Added config file that allows people to customize/disable the default scaffholding
- Added `SessionGuard` that extends the original class but uses the `SilentAuthentication` trait
- Added `SilentAuthentication` trait which will contain the methods to silently authenticate users

[v0.1.1]: https://github.com/cyrildewit/eloquent-viewable/compare/v0.1.0...v0.1.1
