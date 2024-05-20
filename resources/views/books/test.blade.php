<!-- resources/views/books/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book List</h1>
        <table id="book-table" class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Language</th>
                    <th>Publish Date</th>
                    <th>Pages</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be appended here -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'http://online-library.test/api/books',
                method: 'GET',
                success: function(response) {
                    console.log(response); // Log data untuk debugging
                    if (response.status === "success" && response.data && Array.isArray(response.data
                            .data)) {
                        var books = response.data.data;
                        var $tableBody = $('#book-table tbody');
                        $tableBody.empty(); // Clear any existing content
                        books.forEach(function(book) {
                            var row = '<tr>' +
                                '<td>' + book.title + '</td>' +
                                '<td>' + book.author + '</td>' +
                                '<td>' + book.publisher + '</td>' +
                                '<td>' + book.language + '</td>' +
                                '<td>' + book.publish_date + '</td>' +
                                '<td>' + book.pages + '</td>' +
                                '</tr>';
                            $tableBody.append(row);
                        });
                    } else {
                        console.error("No valid data found", response);
                        $('#book-table tbody').append(
                            '<tr><td colspan="6">Error: No valid data found</td></tr>');
                    }
                },
                error: function(error) {
                    console.error("Error fetching data:", error);
                    $('#book-table tbody').append('<tr><td colspan="6">Error fetching data</td></tr>');
                }
            });
        });
    </script>
@endsection
