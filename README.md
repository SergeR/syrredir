# Правила переадресации

Плагин для Shopscript 5.

Плагин позволяет настроить переадресацию с одного URL на другой. Если старого
URL не существует, то клиенту будет отдаваться HTTP код 301 и новый URL.

Да, цепочка работать будет. A->B, B->C приведет пользователя на C.
Увлекаться не надо, в браузерах есть защита от большого количества
последовательных переадресаций.

Многие браузеры кэшируют ответ с 301 кодом. Частое изменение цели может сразу
не отобразиться.

Плагин работает только с URL магазина, то есть неверные URL, например, блога
обрабатываться не будут.

## CHANGELOG
v.1.0.0 - Релиз
