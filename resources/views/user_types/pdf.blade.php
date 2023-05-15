<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <body>
    {{-- <table class="table table-bordered">
      <tr>
        <td>
          {{$order->id}}
        </td>
        <td>
          {{$order->professor->name}}
        </td>
      </tr>
      <tr>
        <td>
          {{$order->estudante->name}}
        </td>
        <td>
          {{$order->tema->name}}
        </td>
      </tr>
    </table> --}}
    <article>
       <div
        style="font-weight: bold; 
        text-align: center; text-transform: uppercase;">
            <h1>UNIVERSIDADE MANDUME YA NDEMUFAYO</h1>
            <h1>INSTITUTO POLITÉCNICO DA HUÍLA</h1>
            <h1>Tema: {{$order->tema->name}}</h1>
       </div>
       <div style="margin-top: 1.25rem; padding: 0 1.25rem;">
           <p>Este documento serve de um parecer de aceitação do
            orientando e do orientador onde ambos devem assinar.</p>
       </div>
       <div
       style="display: g; justify-content: space-between; 
       align-items: center; padding: 8rem 0;
       margin-left: auto; margin-right: auto;">
           <div
           style="text-align: center; padding: 0 1.5rem;
           font-weight: bold;
           "
           >
               <h4 class="pb-4" style="padding-bottom: 1rem;">O Estudante</h4>
               <span>______________________________</span>
               <h4>{{$order->estudante->name}}</h4>
           </div>
           <div class="max-w-md text-center px-6 
           font-semibold space-y-3"
           style="text-align: center; padding: 0 1.5rem;
           font-weight: bold;
           "
           >
            <h4 class="pb-4" style="padding-bottom: 1rem;">O Docente</h4>
            <span>______________________________</span>
            <h4>{{$order->professor->name}}</h4>
        </div>
       </div>
       <div>
           <h1 class="font-bold text-xl
            text-center" style="font-weight: bold; 
            font-size: 1.25rem; text-align: center;">Lubango, 2022</h1>
       </div>
    </article>
  </body>
</html>