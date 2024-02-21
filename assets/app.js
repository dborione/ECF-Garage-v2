/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import htmx from 'htmx.org';
import 'preline';
// import 'preline/dropdown';

window.htmx = htmx;

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

let height = 20;
let width = 20;
let colors = ["red", "green", "blue"];
let i = 0;
function chSquare() {
    height += 10;
    width += 10;
    if (height >= 100 || width >= 100) {
        height = 20;
        width = 20;
    }
    let hStr = width.toString();
    let wStr = width.toString();
    document.getElementById("square").style.width = wStr + "px";
    document.getElementById("square").style.height = hStr + "px";
    i += 1;
    if (i == 3)
        i = 0;
    document.getElementById("square").style.backgroundColor = colors[i];
}
function outMouse() {
    height -= 5;
    width -= 5;
    if (height <= 200 || width <= 200) {
        height = 20;
        width = 20;
    }
    let hStr = width.toString();
    let wStr = width.toString();
    document.getElementById("square").style.width = wStr + "px";
    document.getElementById("square").style.height = hStr + "px";
    if (i == 0)
        i = 3;
    i -= 1;
    document.getElementById("square").style.backgroundColor = colors[i];
}
document.getElementById("square").addEventListener("click", chSquare);
document.getElementById("square").addEventListener("mouseout", outMouse);