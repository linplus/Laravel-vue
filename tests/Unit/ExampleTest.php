<?php

namespace Tests\Unit;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Http::fake(function (Request $request) {
//            var_dump($request->url());
//           var_dump($request->headers());
//            var_dump($request->body());
            throw new ConnectionException("connect failed");
            //sleep(10);
//            return Http::response('Hello World');
        });
    }

    public function test_example()
    {
        try {
//            $response = Http::retry(3, 1000)->withHeaders(
//                [
//                    'X-id' => '999',
//                    'first' => 'foo',
//                ]
//            )->get('http://example.com', [
//                'name' => 'Taylor',
//                'page' => 1,
//            ]);
//            $response = Http::retry(3, 100, function ($exception) {
//                echo "\n>>>>>> retry ...".time().$exception->getMessage();
//                return $exception instanceof ConnectionException;
//            })->post('http://example.com');

//            $response = Http::withHeaders(['X-id' => '999'])
//                ->withOptions(['auth' => ['username', 'password']])
//                ->post('http://example.com');
            //$this->print($response);

            //$response = Http::github()->get('/suburl');

            $response = Http::github()->timeout(1)->get('/');

            $response->onError(function (Response  $resp) {
                echo "print......\n".$resp->status();
                //print_r($resp);
            });

            $response->throw(function (Response  $response, RequestException $e) {
                echo "\nstatus......\n".$response->status();
                echo "\nexcept......\n".$e->getMessage();
                print_r($e);
            })->body();

            $this->assertTrue(true);

        }
        catch (ConnectionException $t) {
            echo "\n>>>>>> catch ConnectionException...".time().$t->getMessage();
            //throw new \Exception('throw new');
        }
        catch (RequestException  $t) {
            echo "\n>>>>>> catch RequestException...".time().$t->getMessage();
            //throw new \Exception('throw new');
        }

        //Http::dd()->get('http://example.com');

//        $response = Http::post('http://example.com/users', [
//            'name' => 'Steve',
//            'role' => 'Network Administrator',
//        ]);
    }

    private function print($response)
    {
        $i = 0;
        echo "\n" . (++$i) . ":";
        print_r($response->body());
        echo "\n" . (++$i) . ":";
        print_r($response->json());
        echo "\n" . (++$i) . ":";
        print_r($response->object());
        echo "\n" . (++$i) . ":";
        print_r($response->collect());
        echo "\n" . (++$i) . ":";
        print_r($response->status());
        echo "\n" . (++$i) . ":";
        print_r($response->ok());
        echo "\n" . (++$i) . ":";
        print_r($response->successful());
        echo "\n" . (++$i) . ":";
        print_r($response->redirect());
        echo "\n" . (++$i) . ":";
        print_r($response->failed());
        echo "\n" . (++$i) . ":";
        print_r($response->serverError());
        echo "\n" . (++$i) . ":";
        print_r($response->clientError());
        echo "\n" . (++$i) . ":";
        print_r($response->headers());
    }
}
