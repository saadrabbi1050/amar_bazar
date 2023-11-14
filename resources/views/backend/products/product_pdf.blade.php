<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    table , th , td , tr {
        border:1px solid;
    }
</style>


<h3 style="text-align:center">Report On Products</h3>
<table>
    <thead>
      <tr>
        <th scope="col">Ser No</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>

      @php
        $sl = 1;
      @endphp
      
      @foreach ($products as $product)
          <tr>
            <th scope="row"> {{ $sl++ }} </th>
            <td>{{ $product->title ?? '' }}</td>
            <td>{{ $product->price ?? 'No Price Setup' }}</td>
          </tr>
      @endforeach

        
    </tbody>
  </table>