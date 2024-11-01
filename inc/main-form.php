<div class="slope-main">
  <section class="slope-container">
    <div class="left__area">
      <div class="slope__nav">
        <h2 class="change-clr">Slope Calculator</h2>
        <button
          class="type__navigator active"
          data-value="two__points__equation"
        >
          Two Points
        </button>
        <button class="type__navigator" data-value="line__equation">
          Line Equation
        </button>
      </div>
      <!-- <div class="slope__footer"></div> -->
    </div>
    <div class="right__area">
      <form action="#">
        <!------------------------>
        <!---TWO POINTS EQUATION-->
        <!------------------------>
        <div
          id="two__points__equation"
          class="inputs two__points__equation visible"
        >
          <h3>
            Enter Value X<sub>1</sub>, Y<sub>1</sub>, X<sub>2</sub> and Y<sub
              >2</sub
            >
          </h3>
          <div class="form__group">
            <label for="point__x1"> Point X<sub>1</sub> </label>
            <input type="number" name="point__x1" id="point__x1" />
          </div>
          <div class="form__group">
            <label for="point__x2"> Point X<sub>2</sub> </label>
            <input type="number" name="point__x2" id="point__x2" />
          </div>
          <div class="form__group">
            <label for="point__y1"> Point Y<sub>1</sub> </label>
            <input type="number" name="point__y1" id="point__y1" />
          </div>
          <div class="form__group">
            <label for="point__y2"> Point Y<sub>2</sub> </label>
            <input type="number" name="point__y2" id="point__y2" />
          </div>
        </div>
        <!------------------------>
        <!-----Line EQUATION------>
        <!------------------------>
        <div id="line__equation" class="inputs line__equation">
          <h3>Enter point of Line Equation</h3>
          <div class="form__group">
            <input
              type="number"
              name="point__x"
              id="point__x"
              class="line__eq"
              target-id="line__x"
            />
            <label for="point__x">X</label>
          </div>
          <div class="form__group">
            <input
              type="number"
              name="point__y"
              id="point__y"
              class="line__eq"
              target-id="line__y"
            />
            <label for="point__y">Y</label>
          </div>
          <div class="form__group">
            <input
              type="number"
              name="point__z"
              id="point__z"
              class="line__eq"
              target-id="line__z"
            />
            <div class="eq__result">
              <span> =</span> <span id="answer">0</span>
            </div>
          </div>

          <div class="equation">
            <span>Equation is</span>
            <span class="eq">
              <span id="line__x__sign"></span>
              <span id="line__x"></span
              ><span>x <span id="line__y__sign">+</span></span>
              <span id="line__y"></span
              ><span>y <span id="line__z__sign">+</span></span>
              <span id="line__z"></span><span>c = 0</span>
            </span>
          </div>
        </div>

        <input
          type="hidden"
          name="calculation__type"
          id="calculation__type"
          value="two__points__equation"
        />
        <div id="submit__btns" class="submit__btns">
          <input type="reset" value="Reset" />
          <input class="change-clr" id="slopecalculate" type="submit" value="Calculate" />
        </div>
      </form>
      <!------------------------>
      <!---------RESULT--------->
      <!------------------------>
      <div id="results" class="results">
        <h3>Result</h3>
        <div class="result__wrapper">
          <span>
            <strong>Slope (m) </strong> = <span class="slope__m"></span>
          </span>
          <span> <strong>Slope Intercept </strong> y = mx+b </span>
        </div>
        <h3>Solution:</h3>
        <div id="we__have">
          <span class="w-100"> We have</span>
          <div class="values__given">
            <span> X<sub>1</sub> = <span id="x1">3</span> </span>
            <span> X<sub>2</sub> = <span id="x2">2</span> </span>
            <span> Y<sub>1</sub> = <span id="y1">3</span> </span>
            <span> Y<sub>1</sub> = <span id="y2">3</span> </span>
          </div>
        </div>
        <div class="formula">
          <span>Formula to find</span>
          <span id="formula" class="formula__eq"> </span>
        </div>
        <div class="result__wrapper">
          <span>
            <strong>Slope (m) </strong> = <span class="slope__m">1.33</span>
          </span>
        </div>
        <div class="submit__btns">
          <input
            type="reset"
            data-target="two__points__equation"
            id="reset"
            value="Reset"
          />
        </div>
      </div>
    </div>
  </section>
</div>
