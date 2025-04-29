
# 🛡️ Shopware 6 Security Headers Plugin

Dieses Plugin erweitert die Sicherheit Ihres Shopware 6 Shops durch die **dynamische Konfiguration von Sicherheitsheadern**.  
Es bietet eine flexible Lösung zum Schutz vor verschiedenen Risiken moderner Webanwendungen – ideal auch zur Vorbereitung auf Penetrationstests und regelmäßige Wartungsarbeiten.

Befindet sich der Shopware 6 Shop im Wartungsmodus, können bestimmte sicherheitsrelevante HTTP-Header fehlen, was potenzielle Angriffsflächen wie Clickjacking oder Content-Injection eröffnet. Dieses Plugin stellt sicher, dass auch im Wartungsmodus wichtige Sicherheitsheader wie Content-Security-Policy oder X-Frame-Options korrekt gesetzt werden.

---

## ✨ Funktionen

### 1. Content-Security-Policy (CSP)
- Verhinderung von Cross-Site-Scripting (XSS)
- Schutz vor Code-Injection-Angriffen
- Granulare Kontrolle über erlaubte Inhaltsquellen

**Beispiel:**
```
default-src 'self' 'unsafe-inline';
script-src 'self' https://trusted-cdn.com;
style-src 'self' https://fonts.googleapis.com;
```

### 2. Content-Security-Policy-Report-Only
- Sicheres Testen neuer CSP-Konfigurationen
- Überwachung potenzieller Sicherheitsverletzungen ohne direkte Durchsetzung
- Ideal zur Vorbereitung neuer Richtlinien bei Wartungsarbeiten

**Beispiel:**
```
default-src https:;
report-uri /csp-violation-report-endpoint/;
```

### 3. Permissions-Policy
- Kontrolle über Browser-APIs und Funktionen
- Einschränkung potenziell sensibler Browserfeatures
- Schutz vor ungewollten Berechtigungen

**Beispiel:**
```
camera=(),
microphone=(),
geolocation=(),
interest-cohort=()
```

---

## 🚀 Installation

### Methode 1: Über die Kommandozeile
```bash
# Plugin-Ordner kopieren
cp -R SwagSecurityHeaders custom/plugins/

# Plugin installieren und aktivieren
bin/console plugin:refresh
bin/console plugin:install --activate SwagSecurityHeaders
bin/console cache:clear
```

### Methode 2: Über die Administration
1. Navigieren Sie zu **Einstellungen > System > Plugins**.
2. Klicken Sie auf **"Plugin hochladen"**.
3. Wählen Sie die ZIP-Datei.
4. Installieren und aktivieren Sie das Plugin.

---

## 🔧 Konfiguration

- Navigieren Sie zu **Einstellungen > System > Plugins**.
- Suchen Sie **"Security Headers"**.
- Klicken Sie auf **"Konfigurieren"**.
- Aktivieren und konfigurieren Sie die gewünschten Header individuell.
- Speichern Sie die Einstellungen.

---

## 🕵️ Sicherheitsüberprüfung

Nutzen Sie die folgenden Tools zur Überprüfung Ihrer Header-Konfiguration:
- [securityheaders.com](https://securityheaders.com/)
- [Mozilla Observatory](https://observatory.mozilla.org/)

---

## 🔬 Technische Implementierung

- Nutzung eines **Event-Subscribers** auf `KernelEvents::RESPONSE`
- **Dynamisches Hinzufügen** der Header zu HTTP-Antworten
- **Vermeidung von Konflikten** mit anderen Plugins oder Core-Funktionen

---

## 🔒 Sicherheitshinweise

- **Regelmäßige Überprüfung** und **Anpassung der Header** empfohlen
- **Änderungen zuerst im Report-Only-Modus testen**
- **Berücksichtigung spezifischer Anforderungen** Ihrer Shop-Umgebung
- Unterstützt Wartungs- und Optimierungsmaßnahmen durch flexibles Management der Header

---

## 🔗 Kompatibilität

- **Shopware:** ab Version **6.6.0.0**
- **PHP:** ab Version **8.1**

---

## 📄 Lizenz

Dieses Plugin ist unter der [MIT-Lizenz](LICENSE) veröffentlicht.

---

## 🤝 Beitrag und Unterstützung

- Fehler gefunden oder Verbesserungsvorschläge?  
→ **Erstellen Sie ein Issue oder einen Pull Request** auf GitHub.

---

**Hinweis:**  
Dieses Plugin stellt einen wichtigen Beitrag zur Härtung Ihres Shops dar, ersetzt aber keine vollständige Sicherheitsstrategie.
