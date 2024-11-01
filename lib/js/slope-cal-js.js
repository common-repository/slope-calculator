__$ = (id) => {
    return document.getElementById(id);
};
__el = (query) => {
    Array.from(document.querySelectorAll(query)).forEach((x) => {
        return x;
    });
};

let x = document.querySelectorAll(".type__navigator");
function handler(event) {
    document.querySelectorAll("div.inputs").forEach((el) => {
        fadeOut(el);
    });
    for (const el of document.querySelectorAll(".type__navigator.active")) {
        el.classList.remove("active");
    }
    event.currentTarget.classList.add("active");
    target__id = event.currentTarget.getAttribute("data-value");
    __$('reset').setAttribute('data-target', target__id)
    document.getElementById("calculation__type").value = target__id;
    fadeIn(__$(target__id));
}
x.forEach((el, i) => {
    el.addEventListener("click", (e) => {
        fadeOut(__$("results"));
        fadeIn(__$("submit__btns"));
        handler(e);
    });
});

function fadeIn($element) {
    $element.style.display = "flex";
    $element.style.opacity = 0;
    recurseWithDelayUp($element, 0, 1);
}
function fadeOut($element) {
    $element.style.display = "none";
    $element.style.opacity = 1;
    recurseWithDelayDown($element, 1, 0);
}

function recurseWithDelayDown($element, startFrom, stopAt) {
    window.setTimeout(function () {
        if (startFrom > stopAt) {
            startFrom = startFrom - 0.1;
            recurseWithDelayDown($element, startFrom, stopAt);
            $element.style.opacity = startFrom;
        } else {
            $element.style.display = "none";
        }
    }, 10);
}
function recurseWithDelayUp($element, startFrom, stopAt) {
    window.setTimeout(function () {
        if (startFrom < stopAt) {
            startFrom = startFrom + 0.1;
            recurseWithDelayUp($element, startFrom, stopAt);
            $element.style.opacity = startFrom;
        } else {
            $element.style.display = "flex";
        }
    }, 10);
}

let calculate_btn = __$("slopecalculate");
calculate_btn.addEventListener("click", (e) => {
    e.preventDefault();
    let calculation__type = __$("calculation__type").value;
    calculate(calculation__type);
});

function calculate(calculation__type = "two__points__equation") {
    if (calculation__type == "two__points__equation") {
        let x1 = __$("point__x1").value;
        let x2 = __$("point__x2").value;
        let y1 = __$("point__y1").value;
        let y2 = __$("point__y2").value;

        if (isEmpty(x1) || isEmpty(x2) || isEmpty(y1) || isEmpty(y2)) {
            alert("Please fill all the fields");
        } else {
            showResults("two__points__equation");
            let calc = (parseFloat(y2) - parseFloat(y1)) / (parseFloat(x2) - parseFloat(x1));
            __$("x1").innerHTML = x1;
            __$("x2").innerHTML = x2;
            __$("y1").innerHTML = y1;
            __$("y2").innerHTML = y2;
            __$("results").classList.add("visible");
            let formula = `
            <span>
              <span>y<sub>2</sub></span>
              -
              <span>y<sub>1</sub></span>
            </span>
            <span class="divider"></span>
            <span>
              <span>x<sub>2</sub></span>
              -
              <span>x<sub>1</sub></span>
            </span>
        `;
            __$("formula").innerHTML = formula;

            Array.from(
                document.getElementsByClassName(
                    __$("formula").parentElement.className
                )
            ).forEach((el) => {
                el.style.flexDirection = "row";
                el.style.alignItems = "center";
            });
            Array.from(document.getElementsByClassName("slope__m")).forEach(
                (el) => {
                    el.innerText = calc.toFixed(2);
                }
            );
            __$("we__have").style.display = "block";
            return parseFloat(calc).toFixed(2);
        }
    } else if (calculation__type == "line__equation") {
        let __x = __$("point__x").value;
        let __y = __$("point__y").value;
        let __z = __$("point__z").value;

        if (isEmpty(__x) || isEmpty(__y) || isEmpty(__z)) {
            alert("Please fill all the fields");
        } else {
            let __m = -parseFloat(__x) / parseFloat(__y);
            let __c = parseFloat(__z) / parseFloat(__y);

            let formula = `
            <span>
              <span>${__x}x</span>
              +
              <span>${__y}y</span>
              +
              <span>${__z}</span>
              =
              <span>0</span>
            </span>

          <span class='division'>
              <span>
              <span>-${__x}x</span>
              -
              <span>${__y}y</span>
            </span>
            <span class="divider"></span>
            <span>
              <span>${__z}</span>
            </span>
          </span>
        `;

            Array.from(
                document.getElementsByClassName(
                    __$("formula").parentElement.className
                )
            ).forEach((el) => {
                el.style.flexDirection = "column";
                el.style.alignItems = "flex-start";
            });

            __$("formula").innerHTML = formula;

           
            let calc = (-parseFloat(__x) - parseFloat(__z)) / parseFloat(__y);
            calc = __m;
            __$("we__have").style.display = "none";
            Array.from(document.getElementsByClassName("slope__m")).forEach(
                (el) => {
                    el.innerText = calc.toFixed(2);
                }
            );
            showResults("line__equation");
            return parseFloat(calc).toFixed(2);
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    Array.from(document.querySelectorAll('.line__eq')).forEach((k, v) => {
        k.addEventListener('keyup', function (e) {
            document.querySelector('.equation').style.display = "block"
            $this__val = e.target.value;
            let $target__id = e.target.getAttribute('target-id');
            __$($target__id).innerText = $this__val;
            if ($this__val < 0) {
                __$($target__id + "__sign").innerText = ""
            }
            else {
                if ($target__id + "__sign" == "line__x__sign") {
                    __$($target__id + "__sign").innerText = ""
                } else {
                    __$($target__id + "__sign").innerText = "+"
                }
            }
        })
        k.addEventListener('change', function (e) {
            $this__val = e.target.value;
            let $target__id = e.target.getAttribute('target-id');
        
            document.querySelector('.equation').style.display = "block"
            __$($target__id).innerText = $this__val;
            if ($this__val < 0) {
                __$($target__id + "__sign").innerText = ""

            }
            else {
                if ($target__id + "__sign" == "line__x__sign") {
                    __$($target__id + "__sign").innerText = ""
                } else {
                    __$($target__id + "__sign").innerText = "+"
                }
            }
        })
    })
})



__$("reset").addEventListener("click", function (e) {
    e.preventDefault();
    let target = e.target.getAttribute('data-target');
    reset(target);
});
isEmpty = (v = "") => {
    if (v == "" || v == "undefined" || v == null) {
        return true;
    }
    return false;
};

reset = (r = "two__points__equation") => {
    fadeOut(__$("results"));
    fadeIn(__$("submit__btns"));
    Array.from(document.querySelectorAll('input[type="number"]')).forEach(function (el) {
        el.value = "";
    })
    document.querySelector('.equation').style.display = "none";
    fadeIn(__$(r));
};

showResults = (r = "two__points__equation") => {
    fadeIn(__$("results"));
    fadeOut(__$("submit__btns"));
    if (r == "two__points__equation") {
        fadeOut(__$("two__points__equation"));
    } else if (r == "line__equation") {
        fadeOut(__$("line__equation"));
    }
};