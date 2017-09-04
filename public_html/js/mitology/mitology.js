var mitology={
  book:[],
  mythologies: {
    'greek': 'Griega',
    'egyptian': 'Egipcia',
    'nordic': 'Nórdica'
  },
  /**
   * Carga uno o varios json de forma asíncrona y agrega los seres mitológicos
   * al array "book"
   * @param  {String/Array}   books nombre de los json a cargar. Puede ser un string
   * o un array
   * @param  {Function} cb    Callback a ejecutar
   */
  onLoadBooks: function(books, cb){
    var me = this;
    books || (books=['greek', 'nordic', 'egyptian']);
    if(typeof books === 'string'){
      this.onLoadJson(books).then(function(res){
        me.addJsonToBook(res);
        typeof cb === 'function' && cb(me.book);
      }).catch(function(err){
        console.log('[error] ', err);
      });
    }else{
      var n = books.length;
      for(var idx in books){
        this.onLoadJson(books[idx]).then(function(res){
          me.addJsonToBook(res);
          --n || typeof cb === 'function' && cb(me.book);
        }).catch(function(err){
          console.log('[error] ', err);
        });
      }
    }
  },
  /**
   * Carga un json de forma asíncrona
   * @param  {String}   json Nombre del archivo json a cargar
   * @param  {Function} cb   callback a ejecutar
   * @return {Promise}        Retorna una instancia de una Promesa
   */
  onLoadJson: function(json, cb){
    return new Promise(function(resolve, reject){
      $.getJSON("/json/mitology/"+json+".json").done(function(res){
        resolve(res);
      }).fail(function(x){
        reject(x);
      });
    });
  },
  /**
   * Agrega un json (información del ser mitológico) al array "book"
   * @param {Object} json Objeto que contiene datos de seres motológicos
   */
  addJsonToBook: function(json){
    if(typeof json !== 'object' && typeof json.book !== 'object') return false;
    for(var x in json.book){
      json.book[x].title=x;
      this.book.push(json.book[x]);
    }
  },
  /**
   * Recorre el array "book" y por cada item crea un "box" en html
   * @param {Array} book Arreglo que contiene seres mitolójicos
   */
  addBoxesHtml: function(book){
    book || (book=this.book);
    if(!(book instanceof Array)) return false;
    for(var x in book){
      var obj = book[x];
      if(typeof obj != 'object') continue;
      this.addBoxHtml(obj);
    }
  },
  /**
   * Añade un "box" de un ser mitológico al contenedor "boxes"
   * @param {Object} obj Objeto que contiene los datos del ser mitológico
   */
  addBoxHtml: function(obj){
    if(typeof obj !== 'object') return false;
    var bg = 'style="'+
      'background-image: url(../../images/mitology/'+obj.type+'/'+obj.image+');'+
      'background-size: cover;"';
    var boxClass = 'box-'+obj.type;
    var box=''+
      '<div class="col-xs-11 col-sm-5 col-md-4 col-lg-3 box '+boxClass+'" '+bg+'>'+
        '<div class="layer-alpha">'+
            '<h3>'+obj.title+'</h3>'+
          '<a href="#"><p>'+obj.description.substring(0, 150)+'...</p></a>'+
          '<div class="box-footer"><a href="#">Mitología '+this.mythologies[obj.type]+'</a></div>'+
        '</div>'
      '</div>';
    $('#boxes').append(box);
  }
};