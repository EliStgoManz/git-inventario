$(document).ready(function() {
            $('.dataTables-example').DataTable({
               dom: '<"html5buttons"B>lTfgitp',
                "sPaginationType": "full_numbers",
                "lengthMenu": [[10,25,50, -1], [10,25,50, "Todo"]],
                buttons: [
                    { extend: 'copy',
                	text: 'Copiar',
                	customize: function (doc){
                            alert('sexy');
                    }
                	},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
							
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
                
            });


        });