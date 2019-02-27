<!DOCTYPE html>

<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internal Page</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="row header__row"><a class="header__logo" href="/"><img src="img/logo.svg"></a>
          <nav class="nav">
            <ul class="nav__list">
              <li class="nav__item"><a class="nav__link" href="">Home</a></li>
              <li class="nav__item"><a class="nav__link" href="">Articles</a></li>
              <li class="nav__item"><a class="nav__link" href="">Contacts</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>
    <main class="main">
      <div class="container">
        <h1 class="title">Internal Page Title</h1>
        <div class="article-body">
          <div class="article-label">sport</div>
		
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, harum?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium debitis deserunt dolore ducimus harum id laborum, magni nostrum obcaecati quia reprehenderit, saepe, veritatis voluptas.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aspernatur consectetur corporis deserunt dignissimos dolor dolore eius excepturi facere fuga laboriosam mollitia numquam odio officia porro ratione repellendus ullam, vel velit voluptas. Amet animi architecto at autem blanditiis commodi cum dolores, illum laboriosam magni, maxime quas quis rerum vel velit.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, aspernatur corporis cupiditate dicta dignissimos eligendi et harum libero nulla porro, provident quaerat repudiandae sapiente tempore voluptate. Accusamus adipisci amet at corporis delectus deserunt doloremque doloribus eaque esse eveniet excepturi impedit ipsum iure magni minima nam, nemo nulla numquam pariatur possimus quam repellat reprehenderit sed similique sit, vel voluptas voluptatibus? Ad aliquam asperiores assumenda deleniti dignissimos dolorem earum et ex in ipsam iste iure iusto laudantium nesciunt, recusandae similique voluptatum. Ab, at atque beatae consequatur corporis dolorum eligendi et expedita fuga, id ipsa ipsam ipsum laborum nam pariatur quidem recusandae ut veritatis. Culpa deserunt dolorum eius itaque optio saepe, sapiente soluta ut voluptate. Commodi consequatur ex magni officiis quam recusandae ullam.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias assumenda aut, debitis deleniti doloremque est et ex harum laudantium natus neque, nostrum odio odit vero. Ad doloribus odio ullam.</p>
        </div>
        <h2 class="title">Comments</h2>
            <div class="comment">
              <div class="comment__header">
                <div class="comment__name">John Smith</div>
                <div class="comment__date">09.11.2018</div>
              </div>
              <div class="comment__text">sit amet, consectetur adipi</div>
            </div>
            <div class="comment">
              <div class="comment__header">
                <div class="comment__name">Joe Doe</div>
                <div class="comment__date">09.11.2018</div>
              </div>
              <div class="comment__text">sit amet, consectetur adipisit amet, consectetur adipisit amet, consectetur adipisit amet, consectetur adipi</div>
            </div>
            <div class="comment">
              <div class="comment__header">
                <div class="comment__name">Homer Simpson</div>
                <div class="comment__date">09.11.2018</div>
              </div>
              <div class="comment__text">sit amet, consectetur adipisit amet, consectetur adipi</div>
            </div>
        <div class="comment-form">
          <h3 class="title">Send Comment</h3>
          <form>
            <div class="form-group form-group--full">
              <label class="form-group__label">Your Comment</label>
              <textarea class="input-field textarea-comment"></textarea>
            </div>
            <div class="form-group form-group--half">
              <label class="form-group__label">Your Name</label>
              <input class="input-field" type="text">
            </div>
            <div class="form-group form-group--half form-group--btn">
              <button class="btn" type="send">send</button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
        <div>Copyright &copy; 2018</div>
      </div>
    </footer>
  </body>
</html>