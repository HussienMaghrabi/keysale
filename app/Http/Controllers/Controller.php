<?php

    namespace App\Http\Controllers;

    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;
    use LaravelFCM\Facades\FCM;
    use LaravelFCM\Message\OptionsBuilder;
    use LaravelFCM\Message\PayloadDataBuilder;
    use LaravelFCM\Message\PayloadNotificationBuilder;

    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function setUpFirebase()
        {
            $json = $this->fireBaseConnectionJson();
            $serviceAccount = ServiceAccount::fromJson($json);
            $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri('https://car-fc895.firebaseio.com')
                ->create();
            $database = $firebase->getDatabase();
            return $database;
        }

        //firebase
        public function fireBaseConnectionJson()
        {
            $data['type'] = "service_account";
            $data['project_id'] = "car-fc895";
            $data['private_key_id'] = "65e467703587d15ca2800dce14160c4ff75fd5cb";
            $data['private_key'] = "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCk7WgUGNMNqnck\nk8hxkobg7Bc2rk04lqyBFZhEMIWx3vwwHGgRDCN9V3as8hLsV3i99fC4gToCFqS8\nMPuYdfTyXr0SIxAtiSPkpqEJaG6gJFFCUuQ4ULrZBscF1uhjrt6of0f3gtX066aB\nAgx2AckV0le/EsEez4yIw21P4QLJn4ZvmgP9R+LbTK1l4xJvI6OtsdHyWz/y30P5\nAMmT1xULnkJ1u9Uma9/li7e2ijXLtB1ipxEpZ2TKeqApdO3wDgvy6sDDRELId5of\nbwt2KO2UwZFm8B/5BC2mNZaSc95umrw1nXbqjJ8P2LWd1IhQwgoZIG9KoozOT00M\nP6hA0GIFAgMBAAECggEAPaOi4dvzSSi8FZYL9HJkaXyjImMbZjpd53KYMWgHF5a0\nnxCGzlRAkVBWgMWKT/1TGX/pAzP855np4JHX/j+bl9fThwtGuRYHraWfCwKWUdCw\n8/5B4FA/vOvdBzAuM09AVS4YygcCiuJlnNKUsKfzLO4rsDRErAy6w8RyPsfkQFD9\nZzPzf/ZQhKKfJwLzxckuXeWzSTmO5lkagGWxnsOfsLFWV6LcNcCYOWfxt5s+tvrj\neSN/Yx+v20SHjJIh9kko5bL1mT6tvDxYgygdLPX9WZvCpqsbYTsAs++JclTB+cTd\n7YtLDmdqmQpBjoqh6b6Q+m+JaBPlCagavcWiRlG5wwKBgQDovAMQ4Yhzy4186SA5\nbAKEIVk0OB1BMu2wcRKyXxK7AvE2DB1FHnC9wT+VgE5N6ViFH3CFTKCcwoUSGOAo\n90fMQ1r+/XFQ7tMeej1Mr0l7yO/Xw7wNFumgjUPyW0YXpBJyvfUxtkJoTp9639Sy\nofBIZae3XA1OLqQj3O69+U4dLwKBgQC1ah7eCd87xnkuOSByBf0Jdn2nvGA+hFOq\n5VcteALSggfua+qp1zG6dIX2PvuGXfQziJOREOy7XTHGTfphijWS3hbKW1KuV9tm\nLWfMV6oZyphg/zfLSQH2z/TyCRLxlJD/F/rKhP+lVbPijsFlerkKiLlGf3ZHtKt/\nFCCMlx6vCwKBgQDgGCjbmE5LMTSLke31XIsPrwy1u1Jv9RnpSvc1yVW/vJWF9SQ5\n6ZWlIO6YhXLgkk8p35v4vk/ooWSAiHNO/sujYze7T05NH6kpL4rWy/F1v4UxvMbV\n07ohXeSO+FQFb3ZUBZSSyWwoA4yMQ/oKBuPW0gssAvbM0Rw7bAB17BfLAQKBgDgQ\nFHvvtxIE8twLAXDbUuhCuvBEMcYAJM8SUs+VX+HoF0ViCkH0Y8TIT8HakuZiUJ5A\nXcId5dq9IS20WWUdThMWGRrt/+4q7n10GLi4erO/vTl0hayH4liAyaSmkzke/XQn\n1/QQB+TzSEUCctfGhjqwJ/mWWFouhjUeZjSsWuojAoGAY2CW90fU0VdGonKTTPKM\nhFrOjpNOl5sAVBEyYYf8Yr/Pcy4OkkIlxJEW3NJBGCw20yyX3WfiHGtJkMTqtZS9\nxm0FO4OS8IYsVCucEmpM30ipHA+WnY7X8a52Tqa3m0eAnbdCdCFvzUlE+bCbQNYf\npHAw9zMAjQGvoVVcmW5ghfc=\n-----END PRIVATE KEY-----\n";
            $data['client_email'] = "firebase-adminsdk-6hpx5@car-fc895.iam.gserviceaccount.com";
            $data['client_id'] = "108609045831167792760";
            $data['auth_uri'] = "https://accounts.google.com/o/oauth2/auth";
            $data['token_uri'] = "https://oauth2.googleapis.com/token";
            $data['auth_provider_x509_cert_url'] = "https://www.googleapis.com/oauth2/v1/certs";
            $data['client_x509_cert_url'] = "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-6hpx5%40car-fc895.iam.gserviceaccount.com";
            $json = json_encode($data);
            return $json;
        }


        public function fireBaseNotificationsHandler($tokens, $data = [])
        {
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60 * 20);
            $notificationBuilder = new PayloadNotificationBuilder($data['title']);
            $notificationBuilder->setBody($data['body'])
                ->setSound('default');
            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData($data);
            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
            $downstreamResponse->numberSuccess();
            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();
            $downstreamResponse->tokensToDelete();
            $downstreamResponse->tokensToModify();
            $downstreamResponse->tokensToRetry();
            $downstreamResponse->tokensWithError();
        }

    }
