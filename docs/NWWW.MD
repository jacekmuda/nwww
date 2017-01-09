# Ustalenia dotyczace kodu

## Repozytorium

Pracujemy we wspólnym repozytorium git, może to być
https://github.com/akcjademokracja/NWWW

Nie umieszczamy w repozytorium żadnych sekretów - powinny być
pobierane ze zmiennych środowiskowych (typu
DATABASE_URL, DATABASE_HOST, SESSION_SECRET etc)

## Stylowanie

Korzystamy ze stylów wygenerowanych z SASS:

1. Biblioteka Bootstrap 3
2. Skórka w formacie bootswatch (katalog /theme/)

    - zawiera typowe bootswatch'owe pliki _variables.scss oraz
    _bootswatch.scss
    - oraz _theme.scss gdzie stylujemy dodatkowo elementy aplikacji
      zgodnie z identyfikacją Akcji. Są tam także pliki stylujące
      specyficzne elementy aplikacji Speakout, jednak są zakomentowane
      w _themes.scss, aby nie kolidowały ze stroną główną. Docelowo
      chcemy mieć jedną skórkę dla wszytkich aplikacji, dlatego dla
      nowych plików w /themes/ należy używać niekolidujących
      selektorów. Naprawda selektorów Speakout (w zakomentowanych
      plikach) tak aby nie kolidowały nie należy do zakresu tej pracy.

3. Style aplikacji, które nie są zależne od skórki (katalog /app-style/)
   - klasy i ich mapowanie na elementy bootstrap
   - klasy dotyczące logiki [pokazywanie, ukrywanie, etc]

Jeżeli pominiemy katalog skórki, aplikcja powinna dobrze działać i
mieć zwykły bootstrapowy wygląd.

# Ogólne ustalenia

- Komentarze są wyłączone na całej stronie.


# Typy treści

## Post aktualności

Standardowy post blogowy WP.

Powinien obsługiwać znacznik _more_, żeby można było oddzielić
początek - zajawkę od reszty dostępnej po kliknięciu "czytaj dalej".

Powinnien móc mieć przypisaną kampanię (lub kampanię matkę, każda
kampania matka jest także kampanią).

Występuje w 3 miejscach:

1. Wstawiony w boks "Aktualności" na stronie głównej. Data, tytuł oraz
   wyświetlona treść do znacznika _more_. lub cała jeżeli go nie ma. W
   przypadku przycięcia dodany jest link "czytaj więcej" prowadzący do
   niezależnej strony postu.

2. Wstawiony do boksu "Działania" w stronie kampanii matki. Zachowanie
jak w 1.

3. Wstawiony na stronie "Wszystkie aktualności" która działa jak 1.,
   jednak zawiera całą historię aktualności (ze stronnicowaniem/paging).

4. Osobna strona postu (działa jak zwykła strona postu WP, bez
   komentarzy). Dostępny po kliknięciu w "czytaj dalej" w 1,2 lub 3.


## Kampania

Kampania obejmuje działania zmierzające w jakimś celu. Kampania może
być zwykła (nazywana także kampanią "Speakout"), lub może zawierać
kilka kampanii, wtedy nazywamy ją kampanią matką. Ponieważ kampania
zwykła może zostać wypromowana na kampanię matkę, powinny być to
obiekty tego samego, a nie dwóch typów; kampania powinna posiadać pole
"is_mother" prawdziwą dla kampanii matki oraz pole "mother" które
wskazuje kampanię matkę danej kampanii (flaga _is_mother_ może być
inferowana z faktu, że _mother_ jest puste).

### Kampania zwykła

Kampania zwykła ma odpowiadającą kampanię w innym systemie. Taka
kampania jest powiązana z kampanią w aplikacji Speakout.

Zwykła kampania posiada pole adresu kampanii speakout:
`https://dzialaj.akcjademokracja.pl/campaigns/127` zamiennie z `https://dzialaj.akcjademokracja.pl/campaigns/nazwa_wewnętrzna`.

Zwykła kampania może pobrać dane ze Speakout, które zawierają np
liczniki akcji. JSON z danami kampanii jest tworzony przez dodanie
`.json` do adresu kampanii, np:
`https://dzialaj.akcjademokracja.pl/campaigns/127.json`, `https://dzialaj.akcjademokracja.pl/campaigns/nazwa_wewnętrzna.json`.

Zwrócone dane w formacie JSON to:

```
{
 "id":127,
 "slug":"nie-dla-rzeczpospolitej-mysliwskiej",
 "name":"Nie dla Rzeczpospolitej Myśliwskiej",
 "internal_name":"polowania",
 "twitter_share_text":"STOP udziałowi dzieci w polowaniach. NIE dla
 władzy myśliwych w lasach @AkcjaDemokracja",
"finished":false,
"rsign_recipients":24753,
"rmails":0,
"rtweets":0,
"rcalls":0,
"rsigns":24752,
"rfacebooks":0,
"action_count":24752,
"rmail_recipients":0,
"rtweet_recipients":0,
"rcall_sessions":0,
"rfacebook_recipients":0,
"goal":50000,
"uniquersigns":23343
}
```

Pola oznaczają:

- id - unikalny identyfikator kampanii Speakout
- slug - unikalny ciąg w adresie url kampanii (/campaigns/`slug`)
- name - tytuł kampanii
- internal_name - nazwa wewnętrzn używana jako przystępny dla ludzi
  identyfikator w tym i innych systemach
- finished - true/false - czy kampania jest zamknięta?
- rmails - ile osób wyłało email w tej kampanii
- rtweets - ile osób zatweetowało w tej kampanii
- rfacebooks - ile osób zapostsowało w tej kampanii
- rfaxes - ile osób wysłało fax w tej kampanii
- rcalls - ile osób wykonało telefon 
- rsigns - ile jest podpisów pod apel w kampanii
- uniquersigns - ile jest unikalnych (według email) podpisów pod apelem
- goal - jaki jest cel zbierania podpisów? Potrzebny, aby wyświetlić
  pasek postępu. Zmienny. Rośnie w miarę dochodzenia podpisów, tak że
  nigdy nie jest tak naprawdę osiągnięty. Jeżeli kampania jest już
  zamknięta, pokazujemy ostatecznie zebrane podpisy (uniquersigns) i ignorujemy ten cel.
- action_counts - ile w ogóle akcji wykonano

Zwykła Kampania powinna posiadać także krótki opis, który jest
edytowalny w WP (nie jest pobiereny ze speakout), obrazek kampanii.

Powinna być możliwość ustawienia (albo mogłoby to być wykryte),
liczniki jakich akcji są wyświetlone. Speakout udostępnia liczniki
akcji: podpis (razem z celem `goal`), wysłlanie maila, tweeta, posta
facebookowego, faksu, zrobienia telefonu. Nie wszystkie akcje są
dostępne w każdej kampanii. WP mogłby wykrywać, że nie ma co
wyświetlać danej akcji, jeżeli licznik wynosi 0; mogłoby to też być
ustawiane.


### Kampania matka

Kampania matka jest długotrwałą kampanią w której skład wchodzą inne
kampanie, odpowiadające różnym jej momentom lub działaniom w jej
ramach. Kampania matka powstaje przez awans/wypromowanie ze zwykłej
kampanii. Często jest to zwykła kampania, w której zbierane są
podpisy, następnie okazuje się, że chcemy tę kampanię
rozbudować. Awansujemy ją na kampanię matkę - to do niej będą przez
cały długi czas trwania zbierane podpisy. Możemy jednak uruchomić inną
zwykłą kampanię w jej ramach, takie jak np. akcja wysyłania maili do
posłów. Ta zwykła kampania będzie krótkotrwała i jest podrzędna
względem kampanii matki.

Kampania matka powinna mieć osobną stronę na WP. Będą w niej
wyświetlone jej dane (takie jak kampanii zwykłej), ale także będą
zagregowane kapmanie zwykłe których jest matką, oraz przyporządkowane
tej kampanii posty aktualności, można także dodać blok dowolny blok
HTML. Te informacje - podpięte kampanie (wraz np z ich licznikami),
aktualności oraz dowolny tekst - powinny być wyświetlone w kolejności,
którą można z mienić (domyślnie data utworzenia obiektu, od najnowszych).
