
<h5 style="text-align:center">Report On Products</h5>
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