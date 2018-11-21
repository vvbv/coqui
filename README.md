# coqui
Coqui es una extensión para el renderizado de documentos usando Markdown. Permite el renderizado de contenido resultate de ejecutar funciones adicionales.

### Ejemplos
---
Los tags extra estarán bajo una sintaxis similar a la de bbcode  

EJ: Hola mundo  
```
[e:helloWorld][/e] → "Hello World"
```

EJ: Print
```
[e:print]"param1"," ","param3"[/e] → "param1 param2"
```

### Especiales
---
**Configuración inicial**: Cada documento debe ser ser inicializado, para este caso, de las siguientes formas.
```
[self scripts="helloWorld,extraTools"][/self]
```
```
[self scripts="helloWorld,extraTools" server="https://..."][/self]
```
**Variables**: Se pueden definir variables de la siguiente manera.
```
[var:varName1]"varValue1"[/var]  
[var:varName2]"Value1","Value2"[/var]
```

EJ: Println usando variables
```
[e:println]"Out:", varName1[/e] → "out:varValue1"
```