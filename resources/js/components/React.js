import React from 'react';
import ReactDOM from 'react-dom';


// <div className="container"  style="display: block" tabindex="-1" role="dialog">
// <div id="example"></div>
//   <div class="modal-dialog">
//     <div class="modal-content">
//       <div class="modal-header">
//         <h5 class="modal-title"> 'Você está conectado' </h5>
      
//       </div>
//       <div class="modal-body">
//         <p>Desenvolvido por Mateus Anjos. 
        
//         https://github.com/mateusanjost/
//         https://mateusanjos.forumeiros.com
//         https://www.linkedin.com/in/mateus-anjos-07650a166/
//         </p>
//       </div>
     
//     </div>
//   </div>
// </div>



function User() {
    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card text-center">
                        <div className="card-header"><h2>Seja bem-vindo</h2></div>

                        <div className="card-body"> <p>Desenvolvido por Mateus Anjos. 
        
        //         https://github.com/mateusanjost/
        //         https://mateusanjos.forumeiros.com
        //         https://www.linkedin.com/in/mateus-anjos-07650a166/
        //         </p></div>
                    </div>
                </div>
            </div>
            <br />
        </div>
       
    );
}

function Registro() {
return  (

   
  <div className="container">
  <div className="row justify-content-center">
    <div className="col-md-8">
      <div className="card">
        <div className="card-header">Registrar entrega</div>
        <div className="card-body">
        
        
          <br />
          <form method="POST" action="/entregas">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <div className="form-group row">
              <label htmlFor="NomedoCliente" className="col-md-4 col-form-label text-md-right">NomedoCliente</label>
              <div className="col-md-6">
                <input id="NomedoCliente" type="text" className="form-control" name="NomedoCliente" defaultValue="" required autoComplete="name" />
                
               
              </div>
            </div>
            
            <div className="form-group row">
              <label htmlFor="Datadeentrega" className="col-md-4 col-form-label text-md-right">Data de entrega</label>
              <div className="col-md-6">
                <input id="Datadentrega" type="date" className="form-control" name="Datadeentrega" defaultValue="" required />
                
               
              </div>
            </div>
            
            <div className="form-group row">
              <label htmlFor="Pontodepartida" className="col-md-4 col-form-label text-md-right">Ponto de partida</label>
              <div className="col-md-6">
                <input id="Pontodepartida" type="string" className="form-control" name="Pontodepartida" defaultValue="" required />
                
               
              </div>
            </div>

            <div className="form-group row">
              <label htmlFor="Pontodedestino" className="col-md-4 col-form-label text-md-right">Ponto de destino</label>
              <div className="col-md-6">
                <input id="Pontodedestino" type="string" className="form-control" name="Pontodedestino" defaultValue="" required  />
                
               
              </div>
            </div>


            <div className="form-group row mb-0">
              <div className="col-md-6 offset-md-4">
                <button type="submit" className="btn btn-primary">
                Registrar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
          
);
}
export default User;
// DOM element
if (document.getElementById('user')) {
    ReactDOM.render(<User />, document.getElementById('user'));
}
if (document.getElementById('registro')) {
  ReactDOM.render(<Registro />, document.getElementById('registro'));
}