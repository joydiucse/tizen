<script>
    function stream_row_to_bigquery(project_id, dataset_id, table_name, row) {
        var url = 'https://www.googleapis.com/bigquery/v2/projects/' + project_id + '/datasets/' + dataset_id + '/tables/' + table_name + '/insertAll';
        var headers = new Headers();
        headers.append('Content-Type', 'application/json');
        headers.append('Authorization', 'Bearer ');

        var body = {
            "rows": [
                {
                    "json": {id:3, name: "joy3"}
                }
            ]
        };

        fetch(url, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(body)
        }).then(function(response) {
            console.log(response);
        });
    }

    stream_row_to_bigquery('project59-402308', 'persion', 'table59')

</script>
