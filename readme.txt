=== Clara Cars ISV & IUC Calculator ===
Contributors: claracars
Tags: portugal, car tax, isv, iuc, calculator
Requires at least: 6.0
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Free Portuguese car-tax calculator — estimate ISV (import tax) and IUC (annual road tax). Maintained estimate, open source, no API key.

== Description ==

Add a free Portuguese vehicle-tax calculator to any page or post. Visitors enter engine size, CO₂, fuel and registration year and get an instant estimate of:

* **ISV** — Imposto Sobre Veículos (one-off import/registration tax)
* **IUC** — Imposto Único de Circulação (annual road tax)

The figures are a **maintained estimate**, cross-checked against the official Autoridade Tributária (AT) tables — not the official AT figure and no substitute for the AT simulator or a despachante. The calculation is open source (MIT): https://github.com/claracarspt/calcs

Available in Portuguese, English, Russian and Ukrainian.

= How to use =

* **Shortcode:** `[claracars_isv]` — optional attributes `lang` (pt|en|ru|ua), `height`, `width`. Example: `[claracars_isv lang="en" height="400"]`
* **Block:** add the "Clara Cars ISV & IUC Calculator" block and pick the language in the sidebar.

= Privacy =

The calculator is loaded in an iframe from claracars.pt. No personal data is collected by the calculator — visitors enter only vehicle parameters and get back numbers. See https://claracars.pt/en/privacy

== Installation ==

1. Upload the plugin to `/wp-content/plugins/` (or install from the Plugins screen).
2. Activate it.
3. Add `[claracars_isv]` to any page/post, or insert the "Clara Cars ISV & IUC Calculator" block.

== Frequently Asked Questions ==

= Is it free? =
Yes. No account, no API key.

= Are the numbers official? =
No — they are a maintained estimate cross-checked against the official AT tables. Always confirm with the official AT simulator before relying on a figure.

= Can I self-host the calculator? =
Yes. The calculator and its API are open source: https://github.com/claracarspt/calcs

== Changelog ==

= 1.0.0 =
* Initial release: `[claracars_isv]` shortcode + block, 4 languages.
