# Shopware 6 Security Headers Plugin

Dieses Plugin verbessert die Sicherheit Ihres Shopware 6 Shops durch Hinzufügen zusätzlicher Sicherheitsheader zu den standardmäßigen Shopware-Headern. Die Header sind über die Administration konfigurierbar und werden auf alle Antworten des Storefronts angewendet.

## Funktionen

Das Plugin ermöglicht die Konfiguration folgender Sicherheitsheader:

### Content-Security-Policy (CSP)

Dieser Header hilft, Cross-Site-Scripting (XSS), Clickjacking und andere Code-Injection-Angriffe zu verhindern. Content Security Policy (CSP) kann zulässige Ursprünge für Inhalte festlegen, einschließlich Skripte, Stylesheets, Bilder, Schriftarten, Objekte, Medien (Audio, Video), iFrames und mehr.

**Beispiel:** `default-src 'self' 'unsafe-inline' *; base-uri 'self';`

### Content-Security-Policy-Report-Only

Dieses Header-Feld ermöglicht es Webentwicklern, mit Richtlinien zu experimentieren, indem sie deren Auswirkungen überwachen (aber nicht erzwingen). Diese Richtlinie wird in den Nur-Bericht-Modus versetzt. Dies eignet sich hervorragend, um eine neue Richtlinie zu testen oder eine bestehende CSP-Richtlinie zu ändern, ohne dass etwas kaputt geht.

**Beispiel:** `default-src https:; report-uri /csp-violation-report-endpoint/`

### Permissions-Policy

Mit diesem Header können Sie steuern, welche Funktionen und APIs im Browser verwendet werden können. Er hieß zuvor Feature-Policy.

**Beispiel:** `camera=(), microphone=(), geolocation=(), interest-cohort=()`

## Installation

1. Kopieren Sie den Ordner `SwagSecurityHeaders` in das Verzeichnis `custom/plugins` Ihrer Shopware 6 Installation
2. Installieren Sie das Plugin über die Kommandozeile oder die Administration:
   ```bash
   bin/console plugin:refresh
   bin/console plugin:install --activate SwagSecurityHeaders
   ```
3. Leeren Sie den Cache:
   ```bash
   bin/console cache:clear
   ```

## Konfiguration

Nach der Installation können Sie das Plugin in der Shopware Administration konfigurieren:

1. Navigieren Sie zu **Einstellungen > System > Plugins**
2. Suchen Sie nach "Security Headers" und klicken Sie auf "Konfigurieren"
3. Aktivieren Sie die gewünschten Header und passen Sie deren Werte an Ihre Bedürfnisse an
4. Speichern Sie die Konfiguration

## Überprüfung

Um die Wirksamkeit der konfigurierten Sicherheitsheader zu überprüfen, können Sie Ihre Website auf [securityheaders.com](https://securityheaders.com) testen. Geben Sie einfach die URL Ihres Shops ein und prüfen Sie die Bewertung.

## Technische Details

Das Plugin verwendet einen Event-Subscriber, der auf das `KernelEvents::RESPONSE`-Event reagiert, um die konfigurierten Sicherheitsheader zu den HTTP-Antworten hinzuzufügen. Die Header werden nur hinzugefügt, wenn sie nicht bereits in der Antwort vorhanden sind, um Konflikte mit anderen Plugins oder der Shopware-Kernfunktionalität zu vermeiden.

## Kompatibilität

Das Plugin ist kompatibel mit Shopware 6.6.0.0 und höher.

## Lizenz

MIT-Lizenz
