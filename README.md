# QualityMirror
## Par projektu
Maģistra darba ietvaros, balstoties uz literatūras studijās un aptaujās iegūto
informāciju, izstrādāts rīku _QualityMirror_, kas ļaus uzņēmējiem novērtēt potenciāli
izstrādājamas vai jau publicētas lietotnes kvalitātes nodrošināšanas pasākumu efektivitāti.
## Uzstādīšana
- nepieciešama servera vide ar uzstādītām MySQL un PHP pakotnēm;
- norādītās komandas izpildāmas ar standarta lietotāja tiesībām;
- izvēlas failu sistēmas katalogu, kurā tiks uzstādīts projekta izpildāmais kods;
- `git clone https://github.com/teobalds/QualityMirror.git`
- `cd QualityMirror`
- `cp .env.example .env`
- jāizveido jaunu mysql datubāzi un lietotāju, kas var piekļūt izveidotajai
datubāzei (tiesības – lasīt, rakstīt, modificēt datubāzes struktūru, veidot
indeksus);
- jārediģē nokopētais  `.env` fails, norādot informāciju par datubāzes pieslēgumu
(`DB_HOST`,
`DB_PORT`,
`DB_DATABASE`,
`DB_USERNAME`,
`DB_PASSWORD`)
- jāuzstāda composer bibliotēka, lai tā būtu pieejama globāli sistēmā (instrukcija https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx);
- Jāveic Laravel projekta uzstādīšana:
- `composer install`
- `php artisan migrate`
- `php artisan db:seed --class=QmQuestionsSeeder`
- `php artisan key:generate`
- `php artisan config:cache`
- Ja izmanto servera vidi, DOCUMENT_ROOT jānorāda uz `{izvēlētais failu
sistēmas katalogs}/QualityMirror/public`. Serverī nokonfigurēto domēna vārdu
norāda `.env` failā kā uzstādījuma `APP_URL` vērtību
- Lokālā vidē iespējams izmantot Laravel iebūvēto izstrādes tīmekļa servisu, ko
iespējams palaist ar komandu php artisan serve, tīmekļa lietotne šajā gadījumā
pieejama adresē http://localhost:8000