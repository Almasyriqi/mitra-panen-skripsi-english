<table>
    <thead>
        <tr>
            <th rowspan="2">Day</th>
            @foreach ($collection["sr"] as $item)
            <th colspan="3">Survival Rate {{$item}}</th>
            @endforeach
        </tr>
        <tr>
            @for ($i = 0; $i < 5; $i++) 
                <th>Average Weight ( g/tail)</th>
                <th>Feed Spent (kg)</th>
                <th>Total Fish Weight (kg)</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < $count; $i++)
        <tr>
            <td>{{$collection["table_simulation_1"][$i]["day"]}}</td>
            @foreach ($table_name as $item)
            <td>{{$collection[$item][$i]["weight"]}}</td>
            <td>{{$collection[$item][$i]["feed_spent"]}}</td>
            <td>{{$collection[$item][$i]["total_weight"]}}</td>
            @endforeach
        </tr>
        @endfor
    </tbody>
</table>