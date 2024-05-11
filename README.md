
# Instagram Login Checker

Bu uygulama **IgApiClient** Kullanarak data.json da bulunan ``` username:password``` Biçimindeki kullanıcı adları ve şifreleri [Rest.php](https://github.com/byk1lla/instabot/blob/main/main/rest.php) Yardımıyla Tek tek deneyerek Doğru olanları bulmanıza yarayan bir REST API Uygulamasıdır.
## API Kullanımı

#### Kullanıcı Girişini Yap
```http
  POST yourhost:3000/login
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `username` | `string` |  Kullanıcı Adı |
| `password` | `string` |  şifre |

Kullanıcı Adı şifrelerle burdan giriş kontrolü yapabilirsiniz.


```http
  POST yourhost:3000/follow
```

| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `username` | `string` |  Kullanıcı Adı |

Giriş Yaptığınız Hesaplarla da buradan Takipçi Gönderebilirsiniz.

  
## Kurulum 

Instagram Checkeri Yüklemek için aşağıdaki adımları izleyin.

```bash 
  git clone https://github.com/byk1lla/instabot
  cd my-project
```
Eğer Windowstaysanız Projenin Kaynak Dosyalarını [buraya tıklayıp](https://github.com/byk1lla/instabot/archive/refs/heads/main.zip) indirebilirsiniz.

Programın Çalışması için bu kütüphaneyi kurmanız gerekiyor.

```bash 
  npm install instagram-private-api
```


## Kullanım/Örnekler
Rest API ı çalıştırmak için 

```bash
  node /main/index.js
```

Komutunu Çalıştırın.

Eğer **Xampp** Kullanıyorsanız API'ı Kurmak istediğiniz Klasöre atabilirsiniz.

Yok ben shellciyim arkadaş diyorsanız da 

```bash 
  php rest.php
```

Şeklinde Kullanabilirsiniz.

## Gereksinimler
  NODE: **20.X**
  PHP: **8.X**
  instagram-private.api: **1.46.X**
#### JsonConverter.php

JsonConverterda siz TXT Dosyalarınızı JSONa çevirerek [Rest.php](https://github.com/byk1lla/instabot/blob/main/main/rest.php) de kullanılacak hale getiriyor.

JsonConverter.php Deki Dosya Adlarını
```php
$txt = 'data.txt';
$json = 'data.json';
```

Bu Şekilde yaparsanız sizin için daha iyi olur fakat isterseniz değiştirebilirsiniz.

Ayrıca Unutmayın ki; txtdeki veriler ```username:password``` şeklinde olmalıdır yoksa çalışmaz.

#### Rest.php
**$dataSource** tan gelen verileri işleyerek **/follow** ve **/login** APIlerine istek gönderiyor.
```php 
  $dataSource = "yourdatasource.json";
```
<div align="center" size="10px">
<sub>(şu anlık sadece /login APIsi çalışmaktadır /follow APIsi için çalışmalarımız sürmektedir.)</sub></div>

## App.js
<div align="center"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flogos-download.com%2Fwp-content%2Fuploads%2F2019%2F01%2FJavaScript_Logo.png&f=1&nofb=1&ipt=1c662e3132fbd96664cbcdc41fe63634f9d05afac8850a19f702138641799a7e&ipo=images" 
  width="20"> <span padding="1px">app.js</span> </div>
 
> [!CAUTION]
> APP Js Programın Yapı Taşıdır ve eğer herhangi bir __sorun__ olursa program çalışmayacaktır. 

Burada Login işlemleri gerçekleşir.

> [!IMPORTANT]
> Sadece **POST** İstekleri Kabul Edilir.


| Parametre | Tip     | Açıklama                |
| :-------- | :------- | :------------------------- |
| `Login` | `boolean` |  Eğer Giriş Başarılıysa true eğer değilse false değerini döndürür. |
| `Error` | `boolean` |  Eğer Giriş Başarısızsa false değerini döndürür.  |
| `errorMsg` | `string` | Hata Mesajını Döndürür. |

## Link

[instagram-private-api](https://docs.igpapi.com/)
[twitter](https://twitter.com/byk1lla_)

## Licences
[MIT](https://choosealicense.com/licenses/mit/)
[APACHE 2.0](https://choosealicense.com/licenses/apache-2.0/)
