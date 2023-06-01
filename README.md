# Vimeovideo
[![Packagist](https://img.shields.io/packagist/v/t3brightside/vimeovideo.svg?style=flat)](https://packagist.org/packages/t3brightside/vimeovideo)
[![Software License](https://img.shields.io/badge/license-GPLv3-brightgreen.svg?style=flat)](LICENSE)
[![Brightside](https://img.shields.io/badge/by-t3brightside.com-orange.svg?style=flat)](https://t3brightside.com)


**TYPO3 CMS extension for Vimeo video content with custom cover images, gallery layout, and backend previews.**

**[Demo](https://microtemplate.t3brightside.com)**

## !!! Important
Since version 1.0.0 not compatible with older versions. Manual update of content elements needed. You're welcome to an upgrade wizard :)

## System requirements

- TYPO3
- fluid_styled_content

## Features
- Load Vimeo API on play
- Cover image optimisation
- Gallery layout with column selection
- Turn on/off titles and descriptions
- Pagination
- Dark mode styling

### Video options available:
- title
- description
- mute
- start & end time
- aspect ratio (widescreen, vertical, square)
- custom cover image

### GDPR compliance
- No external media or cookies before clicking 'Accept & Play'
- No intrusive GDPR notification before actually clicking on the video
- Accept cookies to current or all videos on the domain
- Consent stored in local storage

## Installation
- `composer req t3brightside/vimeovideo` or from TYPO3 extension repository [vimeovideo](https://extensions.typo3.org/extension/vimeovideo/)
- Include static template
- Alter the TypoScript constants if needed
- Install [paginatedprocessors](https://github.com/t3brightside/paginatedprocessors) for pagination
- Extension Configuration: Back end player (default: enabled)
- Extension Configuration: Pagination features (default: disabled)

## Usage

Add as any other content element.

## Sources

- [GitHub](https://github.com/t3brightside/vimeovideo)
- [Packagist](https://packagist.org/packages/t3brightside/vimeovideo)
- [TER](https://extensions.typo3.org/extension/vimeovideo/)

Development and maintenance
---------------------------

[Brightside OÜ – TYPO3 development and hosting specialised web agency](https://t3brightside.com)
