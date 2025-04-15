<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الفاتورة</title>
    <style>
        /* Import or define the Amiri font (ensure the font file is in the public/fonts folder) */
        @font-face {
            font-family: 'Amiri';
            src: url('{{ public_path("fonts/Amiri-Regular.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        
        body {
            font-family: 'Amiri', sans-serif;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 0;
            height: fit-content;
        }

        header, footer {
            margin: 1em 0;
        }

        /* Use table to mimic grid layout */
        header table {
            width: 100%;
            margin-top: 1em;
        }

        header table td {
            text-align: center;
        }

        header table img {
            width: 150px; /* Adjust the logo size */
        }

        header h4 {
            margin: 0;
            text-align: center;
        }

        h4 {
            text-align: center;
            margin-top: 1em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
          
            margin-top: 0.5em;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: right;
        }
       

        th {
            background-color: #f2f2f2;

        }

        caption {
            font-weight: bold;
            margin: 0.8em auto;
            text-align: center;
        }

        footer p, footer h5 {
            text-align: left;
            margin: 0.5em 0;
        }
        h4{
            border-bottom: solid 1px black;
            width: 400px;
            margin: 1em auto;
        }
    </style>
</head>
<body>
    <!-- Header Section Using Table (3 Columns without borders) -->
    <header>
        <table >
            <tr style=" border: none;">
                <td style="width: 33%; padding: 0 10px;  border: none;">
                    <p>
                        المملكه المغربيه وزارة العدل <br> محكمة الاستئناف بكلميم
                    </p>
                </td>
                <td style="width: 33%; padding: 0 10px;  border: none;">
                <img src="{{ public_path('images/kingdom-of-morocco-logo-pngpng.png') }}" alt="Morocco logo" width="10%">        
                </td>
                <td style="width: 33%; padding: 0 10px;  border: none;">
                    <p>
                        ⵜⴰⴳⵍⴷⵉⵜ ⵏ ⵍⵎⵖⵔⵉⴱ ⵜⴰⵏⵙⵙⵉⵅⴼⵜ ⵏ ⵜⵏⴰⵣⵓⵔⵜ ⵜⴰⵎⴰⵜⴰⵢⵜ ⵜⴰⵣⵔⴼⵜ ⵏ ⵜⵣⵔⴼⵜ ⵏ ⵜⵏⴰⵣⵓⵔⵜ ⵜⴰⵎⴰⵜⴰⵢⵜ
                    </p>
                </td>
            </tr>
        </table>
    </header>
    
    <!-- Title Section -->
    <div>
        <h4>استمارة المعلومات الخاصة بسحب ملفات من الارشيف بطريقة الكترونية</h4>
    </div>

    <!-- Requested Information Table -->
    <div>
        <caption>المعلومات المطلوبة</caption>
        <table>
            <tr>
                <th>الاسم الكامل</th>
                <th>القسم</th>
                <th>الموضوع</th>
                <th>مرجع الطلب</th>
                <th>تاريخ التسليم</th>
                <th>تاريخ ارجاع الملف</th>
            </tr>
            @foreach($data as $item)
            <tr>
                <td>{{ $item['full_name'] }}</td>
                <td>{{ $item['division'] }}</td>
                <td>{{ $item['topic'] }}</td>
                <td>{{ $item['reference'] }}</td>
                <td>{{ $item['delivery_time']->format('Y-d-m') }}</td>
                <td>{{ $item['return_time'] }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- File Location Table -->
    <div>
        <caption>موقع الملف بالارشيف</caption>
        <table>
            <tr>
                <th>الخزانة</th>
                <th>الرف</th>
                <th>العلبة</th>
            </tr>
            <tr>
                <td>{{$treasury}}</td>
                <td>{{$shelf}}</td>
                <td>{{$box}}</td>
            </tr>
        </table>
      
    </div>
    <div>
        <h5>  اسم الموظف الدي سلم الملف</h5>
         <span>
         {{ $item['delivered_employee'] }}
         </span>
        </div>

    <!-- Footer Section -->
    <footer>
        <p>
            حرر بكلميم بتاريخ : {{ $data[0]['delivery_time']->format('Y-d-m') }}
        </p>
        <h5>التوقيع</h5>
    </footer>
</body>
</html>
