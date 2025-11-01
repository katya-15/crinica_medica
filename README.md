<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Se realizara un proyecto para una clinica medica 
donde se intalara framework de estilo como tailwind y daisyUI

se debe de realizar una instalación de paquetes con lo siguientes comandos recuerde de tener Node JS

```bash
npm install tailwindcss @tailwindcss/vite
```
ese es para instalar los paquetes de tailwind

```bash
npm i -D daisyui@latest
```
este es para instalar los paquetes de daisyUI

igual recuerda que debemos de tener una configuaración en CSS y este es 

```css
@import 'tailwindcss';

@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
@source '../../storage/framework/views/*.php';
@source '../**/*.blade.php';
@source '../**/*.js';

@theme {
    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji',
        'Segoe UI Symbol', 'Noto Color Emoji';
}

@plugin "daisyui" {
  themes: all;
}
```
ahi podemos ya utilizar todoso los temas que nos ofrece daisyUI de igual forma ya podemos utilizar con liberta los componentes y estilo de tailwind 