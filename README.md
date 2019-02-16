# mirafox-test-emulator

Необходимо разработать и воплотить алгоритм работы системы онлайн-
тестирования и эмулировать ее работу. Особенность системы заключается в
том, что сложность каждого вопроса в тесте не одинакова. Дизайн значения
не имеет. Код должен иметь комментарии для удобства его проверки нашим
специалистом.

1. В БД (MySQL) хранятся 100 вопросов теста (тексты вопросов не нужны,
только ID вопросов) и история результатов запуска.
2. В настройках теста можно задать сложность вопросов. Задаваться она
должна случайным образом в пределах диапазона, который указывает
администратор. Сложность 0 означает, что любой пользователь всегда
ответит на этот вопрос правильно (за исключением тестируемых с
интеллектом = 0). Сложность 100 означает, что никто никогда правильно
на этот вопрос не ответит (включая тестируемых с интеллектом = 100).
Админ выбирает диапазон, например, от 50 до 90, и система
автоматически присваивает всем вопросам сложность в этом диапазоне
случайным образом.
3. Для эмуляции прохождения теста админ задает уровень интеллекта
тестируемого от 0 до 100. Интеллект 0 означает, что тестируемый
никогда не сможет правильно ответить ни на один вопрос. Интеллект
100 означает, что тестируемый всегда отвечает правильно на любой
вопрос (за исключением со сложностью 100). Не приветствуется явное
указание граничных случаев в коде, это должно быть результатом
функции.
4. По нажатии на кнопку запуска эмулятора теста система эмулирует
ответы тестируемого на 40 отобранных системой вопросов с учетом
сложности каждого вопроса и интеллекта пользователя. Если значения
отличаются от 0 и 100, то всегда будет элемент непредсказуемости.
Несколько раз запустив прохождения теста при тех же условиях, могут

получаться немного разные результаты. Например, при сложности
вопроса 40 и интеллекте 50 запуская несколько раз можно получить
разные результаты. Тем больше разница между интеллектом и
сложностью тем выше вероятность ответа/ошибки.
Чем больше разница между сложностью и интеллектом, тем ниже
вероятность правильно ответить, но так же допускается случайное
угадывание правильного ответа.
5. Отбор вопросов идет с приоритетом на те вопросы, которые реже
попадались в предыдущих тестированиях. Причем выбор вопросов не
предопределен и происходит случайно, увеличивается лишь
вероятность попадания в тесте вопросов, которые ранее реже других
выпадали тестируемым. Например:

| Номер вопроса | Кол-во использованний |
| ------ | ------ |
| #1 | 3 |
| #2 | 5 | 
| #3 | 7 |

Вероятность выбора вопроса #1 должна быть самой высокой, затем
вопрос #3 и реже всего должен выбираться вопрос #2.
6. Вывод результатов тестирования должен происходить при помощи
аякса в табличном виде. Столбцы содержат следующие данные:
   - Порядковый номер вопроса (от 1 до 40)
   - ID вопроса по БД (от 1 до 100)
   - Количество тестов, в которых этот вопрос ранее встречался
   - Сложность вопроса (от 0 до 100)
   - Был ли дан правильный ответ (Да / Нет)
Над таблицей выводится итоговый результат тестирования в виде:
Тестируемый ответил правильно на Х вопросов из 40.
При повторном нажатии на эмуляцию тестирования таблица
обновляется, старые данные из нее исчезают
7. Все результаты тестирования сохраняются и их можно посмотреть в
отдельном разделе в таблице вида (указаны данные в шапке таблицы):
   - Порядковый номер тестирования
   - Интеллект тестируемого
   - Диапазон сложности вопросов (от до)
   - Результат тестирования (X из 40)