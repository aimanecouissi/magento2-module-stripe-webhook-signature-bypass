# AimaneCouissi_StripeWebhookSignatureBypass

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/v)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/downloads)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![Magento Version](https://img.shields.io/badge/magento-2.4.x-E68718)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![License](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/license)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-stripe-webhook-signature-bypass/require/php)](https://packagist.org/packages/aimanecouissi/module-stripe-webhook-signature-bypass)

Bypasses Stripe webhook signature verification during local webhook replay. The module also removes the **Webhooks
Unconfigured** Admin notification used by the Stripe payment module.

> [!CAUTION]
> This module is intended for development environments only and must **never** be enabled on a **production store**.

## Installation

```bash
composer require --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento module:enable AimaneCouissi_StripeWebhookSignatureBypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage

During local webhook replay, Stripe webhook requests are accepted without a `Stripe-Signature` header, and the
**Webhooks Unconfigured** Admin notification is removed. The package is installed with `--dev`.

## Uninstall

```bash
bin/magento module:disable AimaneCouissi_StripeWebhookSignatureBypass
composer remove --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## Changelog

See [CHANGELOG](CHANGELOG.md) for all recent changes.

## License

[MIT](LICENSE)
