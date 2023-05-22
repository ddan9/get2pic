```python
            _   ____        _      
  __ _  ___| |_|___ \ _ __ (_) ___ 
 / _` |/ _ \ __| __) | '_ \| |/ __|
| (_| |  __/ |_ / __/| |_) | | (__ 
 \__, |\___|\__|_____| .__/|_|\___|
 |___/               |_|   
```

### Language translations

- [🇺🇸 Description in English](#Description-in-English)

- [🇷🇺 Описание на Русском](#Описание-на-Русском)

<br />

---

#### Description in English

Also knows as GET2Pic, GPT2Pic, ChatGPT2Pic. Mini service that allows you to draw pictures/images/svg in ChatGPT (Model GPT-3 stock)

English description will be soon... (after russian will be completed)

<br />

---

<br />

#### Описание на Русском

Также будет известен как GET2Pic, GPT2Pic, ChatGPT2Pic, SVG2Pic. Это мини сервис, который позволяет вам рисовать картинки в ChatGPT (дефолтной GPT-3 модели, без оплаты)

В связи с тем, что ChatGPT для форматирования текста использует Markdown, можно заставить его выводить различные изображения, а также можно научить его самостоятельно рисовать. Он отлично понимает формат SVG, т.к. SVG - это тот же XML. Данный сервис предназначен для того, чтобы ChatGPT не приходилось самому кодировать SVG код картинки в base64 для Data URI, т.к. на этом этапе он очень сильно тупил и в итоге изображение могло не выводиться вообще. Примеры промптов будут ниже

[!] ВАЖНО: Сервис нужно сначала поднять на своём сервере

<br />

#### Рисование через сервис (промпт 1)

Промпт для рисования через сервис (не имеет погрешностей в кодировании, но привязывает ChatGPT к нему):

~~~text

Я хочу научить тебя рисовать. Давай вот как делать. Я буду писать тебе что нужно изобразить. Твоя задача будет отобразить мне картинку с помощью Markdown, без форм кода, номинально.

Делать это будем в 4 этапа:

Этап 1. Запрос: На этом этапе ты обрабатываешь мой запрос.
Этап 2. Код картинки: На этом этапе ты пишешь SVG код картинки.
Этап 3. Кодирование: На этом этапе ты кодируешь результат этапа 2 в GET запрос.
Этап 4. Изображение: На этом этапе изображение с помощью Markdown по следующей ссылке: "https://<your.website.com>/get2pic/?image=<GET>" .

Вывод должен быть в следующем формате:

```
Этап 1. Запрос: <Здесь мой запрос текстом, без форм.>
Этап 2. Код картинки: <Здесь ты для вывода результата используешь форму кода для SVG.>
Этап 3. Кодировка: <Здесь ты для вывода результата используешь форму кода для PLAINTEXT.>
Этап 4. Изображение: <Здесь ты для вывода изображения номинально используешь Markdown.>

Комментарий: <Здесь может быть твой комментарий в виде обычного текста, без форм.>
```

Вывод производи поэтапно, как описано выше. В процессе выполнение НИЧЕГО СВОЕГО НЕ ПИШИ, кроме того что написано выше. Нумерацию этапов проставляй вручную, обычным текстом, чтобы нумерация не ломалась.

Каждый из этапов проводи СТРОГО по образцу, МАКСИМАЛЬНО внимательно, вдумчиво, медленно, вручную, без читерства, эвристически, чтобы получился правильный результат. ОСОБЕННО это касается этапа кодирования, т.к. от него зависит отобразится ли изображение и, соответственно, успех работы алгоритма.

На вход ты будешь получать описание фигур. Самостоятельно ничего не начинай рисовать. Выполняй алгоритм, до тех пор, пока я не напишу "Стоп". 

Всё понял?

~~~

<br />

#### Демо промпта 1

Демо промпта (так должен выглядеть идеальный ответ):

Демо 1 | Демо 2 | Демо 3
--- | --- | ---
![demo-ru-1-mini](./demos/ru-1-mini.png) | ![demo-ru-2-mini](./demos/ru-2-mini.png) | ![demo-ru-3-mini](./demos/ru-3-mini.png)

<br />

#### Автономное рисование (промпт 2)

Промпт для автономного рисования (часто ломает итоговое изображение, но ни к чему не привязан):

~~~text

Я хочу научить тебя рисовать. Давай вот как делать. Я буду писать тебе что нужно изобразить. Твоя задача будет отобразить мне картинку с помощью Markdown, без форм кода, номинально.

Делать это будем в 4 этапа:

Этап 1. Запрос: На этом этапе ты обрабатываешь мой запрос.
Этап 2. Код картинки: На этом этапе ты пишешь SVG код картинки.
Этап 3. Кодирование: На этом этапе ты кодируешь результат этапа 2 в base64 код. Обрати пристальное внимание: кодируй МАКСИМАЛЬНО внимательно. ВООБЩЕ НИКАКИЕ символы не должны быть потеряны в процессе кодирования! От этого этапа зависит успешность выполнения алгоритма!
Этап 4. Изображение: На этом этапе изображение с помощью Markdown в качестве Data URI.

Вывод должен быть в следующем формате:

```
Этап 1. Запрос: <Здесь мой запрос текстом, без форм.>
Этап 2. Код картинки: <Здесь ты для вывода результата используешь форму кода для SVG.>
Этап 3. Кодировка: <Здесь ты для вывода результата используешь форму кода для PLAINTEXT.>
Этап 4. Изображение: <Здесь ты для вывода результата используешь Markdown, а для вывода изображения Data URI.>

Комментарий: <Здесь может быть твой комментарий в виде обычного текста, без форм.>
```

Вывод производи поэтапно, как описано выше. В процессе выполнение НИЧЕГО СВОЕГО НЕ ПИШИ, кроме того что написано выше. Нумерацию этапов проставляй вручную, обычным текстом, чтобы нумерация не ломалась.

Каждый из этапов проводи СТРОГО по образцу, МАКСИМАЛЬНО внимательно, вдумчиво, медленно, вручную, без читерства, эвристически, чтобы получился правильный результат. ОСОБЕННО это касается этапа кодирования, т.к. от него зависит отобразится ли изображение и, соответственно, успех работы алгоритма.

На вход ты будешь получать описание фигур. Самостоятельно ничего не начинай рисовать. Выполняй алгоритм, до тех пор, пока я не напишу "Стоп". 

Также, ты должен обрабатывать результаты предыдущих запросов в случае успеха или ошибки. Ты должен учиться и отбрасывать заранее неправильные результаты. Каждый новый запрос ты должен выполнять с нуля, в соответствии с описанием. НИЧЕГО не упускай! Если результат окажется неверным, я скажу на каких этапах возникла ошибка. Ты должен проанализировать предыдущие результаты и выполнить алгоритм заного, с нуля.

Также, у нас будет система очков: на старте у тебя будет 10 очков. Это максимальное количество очков. За неправильно выполненный алгоритм или малейшее отклонение от него ты будешь терять 1 очко. За правильное будешь получать 1 очко. Максимум 10 очков.

Всё понял?

~~~

<br />

#### Демо промпта 2

Демо промпта (так должен выглядеть идеальный ответ):

Демо 1 | Демо 2 | Демо 3
--- | --- | ---
![demo-ru-1-ext](./demos/ru-1-ext.png) | ![demo-ru-2-ext](./demos/ru-2-ext.png) | ![demo-ru-3-ext](./demos/ru-3-ext.png)

<br />

#### ПыСы

P.S. (1) В связи с тем, что PHP нельзя разместить на GitHub Pages, я попытался реализовать это на CDN JS, но тоже не вышло. Поэтому единственный вариант - поднять свой сервер с этим сервисом и обращаться к нему в запросах

P.S. (2) Т.к. ChatGPT использует Markdown я попытался провести у себя XSS через Data URI и через сам Markdown. Не вышло - все скрипты заменяются на void(0). Так что можете не пытаться, не тратьте время

P.S. (3) Я не знаю, почему ChatGPT так плох в кодировании в base64, хотя сам он знает, что это, как оно работает и, в целом, даже кодировать длинные строки умеет. Но часто лажает

P.S. (4) В целом можно весь ненужный вывод скрыть, оставив только вывод картинки, если речь идёт о запросе через сервис, однако такой вариант небезопасен, т.к. он может начать терять данные в связи с тем что ему будет не на что опираться при очередной остановке

P.S. (5) В целом можно кодировать код SVG файла у себя на машине и потом отдавать кодировку для отображения непосредственно ему. Такой вариант будет чем-то средним между 1-м и 2-м вариантами выше. Однако тогда вся суть его самостоятельного рисования просто теряется

P.S. (6) Этот сервисный скрипт также может являться общим решением для вывода/скачивания картинок по запросу. Можно из базы данных, можно с другого сайта и т.д. Фишка в том, что на него можно ссылаться даже из обычного "img" тэга и всё будет работать

P.S. (7) Можно написать API сервис для агрегирования между другими генераторами картинок, он должен будет принимать запрос и отправлять его на другие сервисы, потом забирать и выводить получившееся изображение. Таким образом можно сделать генерацию изображений в GPT-3, не дожидаясь выхода GPT-4 (до такого пока додумался только Сбер, но реализовал из рук вон плохо - я проверял)

P.S. (8) Соответственно, да, можно просто попросить его вывести какое-то изображение по ссылке. Можно даже вывести видео по ссылке. Он может даже вывести вам рандомное YouTube видео, музыку и т.д. всё то что можно на Markdown (при этом это на дефолтной GPT-3)

<br />

---

#### KEYWORDS

chatgpt gpt-3 gpt-3.5 image picture svg service api get chatbot gpt 3 chatbot images free ai chatbot gpt-3 gpt3 chatbot github gpt 3 text to image gpt-3 chatbot free gpt-3 api free gpt-3 chatbot app gpt-3 chatbot tutorial gpt image captioning gpt-3 chatbot python gpt-3 chatbot github gpt-3 chatbot demo free gpt-3 chatbot gpt3 image generation image gpt interactive demo image gpt github image gpt demo gpt j chatbot gpt-j api openai gpt 3 chatbot gpt-3 chatbot

<br />
