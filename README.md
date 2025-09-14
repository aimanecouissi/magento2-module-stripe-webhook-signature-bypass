# AimaneCouissi_StripeWebhookSignatureBypass

Allows **local** testing of Stripe webhooks by bypassing signature verification, so you can replay real webhook payloads against your Magento endpoint when Stripe can’t reach your machine. **Development use only — do not enable in production.**

## Installation
```bash
composer require --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento module:enable AimaneCouissi_StripeWebhookSignatureBypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage
Make a test payment in Magento. In the Stripe Dashboard, open **Developers → Webhooks**, select your Magento endpoint (typically `/stripe/webhooks`), and locate the relevant **Event delivery**. Copy the **request JSON**, then POST it to your local webhook endpoint (e.g., `https://your.local/stripe/webhooks`) using Postman or `curl` with `Content-Type: application/json`. With this module enabled, the request is accepted even without the `Stripe-Signature` header and the event is processed as if it arrived from Stripe.

Example:
```bash
curl -X POST https://your.local/stripe/webhooks \
  -H "Content-Type: application/json" \
  --data-binary @/path/to/stripe-event.json
```

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_StripeWebhookSignatureBypass
composer remove --dev aimanecouissi/module-stripe-webhook-signature-bypass
bin/magento setup:upgrade
bin/magento cache:flush
```

## License
[MIT](LICENSE)
