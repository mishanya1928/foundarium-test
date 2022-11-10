
## API управление автопарком

Все запросы принимаются методом GET
___
## api/link
Метод привязывает автомобиль к водителю

### Параметры запроса
**uid** - идентификатор пользователя, целое число, обязательный параметр.<br/>
**cid** - идентификатор автомобиля, целое число, обязательный параметр.

### Ответ
В случае успеха возвращает код 200, и состояние в формате json.<br/>
В случае ошибки возвращает код 403, и расшифровку ошибки в формате json.

___
## api/clear
Метод снимает водителя с автомобиля

### Параметры запроса
**cid** - идентификатор автомобиля, целое число, обязательный параметр.

### Ответ
Возвращает код 200, и состояние в формате json.<br/>


## api/free_cars

Метод возвращает список свободных автомобилей

### Ответ
Возвращает код 200, и список автомобилей в формате json.
