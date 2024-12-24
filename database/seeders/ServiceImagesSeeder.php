<?php

namespace Database\Seeders;

use App\Models\ServiceImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceImages = [
            ['id' => 3, 'service_id' => 1, 'image' => 'kdTaWIjcuuqPQD4oql4x4SZ5eKxBSdSc2jHCvxuB.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'service_id' => 1, 'image' => '2cFLpdwTXLRNDa6PhQjEl59tGdgdUQfTMMzsXfpZ.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'service_id' => 1, 'image' => '0elf3xFFUiFXlPuHPVISxnpdEbgPeWERJd5Z244D.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'service_id' => 1, 'image' => '17wdbgCtBwyo4ZvLFxZV5kw3B1QXslJUyXky32Bk.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'service_id' => 1, 'image' => 'mmmogvupmGjuoHzgdNj90TOCGqlNjDUvRPjnJ0hc.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'service_id' => 2, 'image' => 'PisGW4Umdg0z6R1wUeOJYEKz2S68lA5ycGjKoZlS.webp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'service_id' => 2, 'image' => 'qsoTWKVfEJoXyBIhsgJsffMVjGfcFHLPIqoaXE3H.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'service_id' => 2, 'image' => '7MolLePPIoQM8wTY5PCCA66gAiQwWooPcO7WUxFG.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'service_id' => 2, 'image' => 'xmSGbUUiehqdTTRD06O7xrwglwbAewwMUdFF0sOT.webp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'service_id' => 2, 'image' => 'HQ3DA2aVn3jKY9Jxzln9cUjTceQU9y45HwQNRZGh.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'service_id' => 3, 'image' => 'qyDN4usaClRLWMKmcuDp8sA2H83Lqk1f7bUBcIrG.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'service_id' => 3, 'image' => 'MdAyqCNsPc85Kgfm71Udk1Bo9kqSSvC19OaZX7Ig.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'service_id' => 3, 'image' => 'n722jzGMbiZFnaFCpMPz4jtBvuOup3w1xZAavpQQ.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'service_id' => 3, 'image' => 'RyadjwNKZLp8H80Ik9LLXADbf2dbxqkDI82Dhvyz.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'service_id' => 3, 'image' => '2Y742mQCSzutVUtIEGotks6s6S2BbFw6cwy3mgvC.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'service_id' => 4, 'image' => 'EAFGDEQhWCdhtoaS36J6weHxABPBrnVOCYtXuDA4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'service_id' => 4, 'image' => 'gNtrkKKrnub1dtH97s5oBp8feeAnfAxKBJDbDyGu.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'service_id' => 4, 'image' => 'ypkuADwPRIlFCkEg29Z295n3WEqYcgmFSzV7wzrx.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'service_id' => 4, 'image' => '2QFqcXkKpIkcpSVYQiDVJQAvd0OT1kGRrIdzEj5Q.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'service_id' => 4, 'image' => 'TYp9kP0dvOxgDeoNfB1JV6sS92vvbntxht43d7EP.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'service_id' => 5, 'image' => 'fiLvlWLE5E11KA0HSf5xm2K4sgf7Jzcr9SIB58CQ.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'service_id' => 5, 'image' => 'Yf0PRzltaOxF6Z0xRK29wBv9rQpvhf2A4ucbMyTn.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'service_id' => 5, 'image' => 'smJx3BHsl5uUdJQGXyURWtN5jRQnSDDlCRbtkQBU.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'service_id' => 5, 'image' => 'pUZjitWVYE5FQTjRISbWa9Sf2mW7fmS0NNVpAqCY.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'service_id' => 5, 'image' => 'mF8p6q8ivWxmNvTg8V62KtSM9ZLf0wAXh4WREjim.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'service_id' => 6, 'image' => 'lj6EinkukKhFa0eJpyggaqFgtwz2V5ch5yJHHZFL.webp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'service_id' => 6, 'image' => 'WJFiPO7M4SdNki9BfBT6PCoHejeTPN5KJyGIQMXv.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'service_id' => 6, 'image' => 'Bu0jt4QaxdS2xaOskj6KVPd490UqrEOosANb0C1u.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'service_id' => 6, 'image' => 'nSZG0ggQMd7NanjHDTn2bTyS12qpoL3vVDkSJ5pJ.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'service_id' => 6, 'image' => 'MtSGU19s57Um311ymlv6RdGzVhdWVCS1e3wJRYhm.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'service_id' => 7, 'image' => 'yKvqDk4Wbms4WNZ2zZG9cTe64Fj2KigdkMVk9vnq.webp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'service_id' => 7, 'image' => '5uaZIMZoJlTSgX3Vs6fwWLLvgWFab6Z7Q3Vcw2v0.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'service_id' => 7, 'image' => 'QDN7yQ5ZoNkydibgs9gVpbXZzoxXNA9TKKmu6Hg5.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'service_id' => 7, 'image' => '6z1XCKyM9pp518DWEZupYeq0fylKcAKzkbvwqOoF.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'service_id' => 7, 'image' => '48XlpqmtoPlHwcimlA4uiayQ9E4MaTpJao1I45YI.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'service_id' => 9, 'image' => 'el2wC1NGAy2EdDfiv51MfLKwfpXKtaLdmyYCWMH6.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'service_id' => 9, 'image' => 'c3vbRiRQNGQQ25dlGR3g6LsrHEQZZvuvqJJ2yMrH.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'service_id' => 9, 'image' => 'TpbFucwLmUgD1yNey6w2k9yM163pc23vSXxn5Ze0.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'service_id' => 9, 'image' => 'BzRdV9BYds0Hv4Uvt4ufA9dCWwD5OyId4qAUMe9q.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 44, 'service_id' => 9, 'image' => 'TRTItigddxWFylV0dbW5luvkCtKIMny1ud0nd896.webp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 45, 'service_id' => 10, 'image' => 'avkjVdqYBl6atDnuYKFypQc3QtLl8T6Sg7vLJot4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 46, 'service_id' => 10, 'image' => 'Fio1NvPxi9YpQS36TwiRbTSN8UvHeqOxXPCVEo44.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 47, 'service_id' => 10, 'image' => 'Kx8tGpWX1jTfzpYriYL2ZxTn0pC8zFawCeDEqmBV.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 48, 'service_id' => 10, 'image' => 'Q57EgzSIibvydlv73qYRVumFsFuXqnwpFsu3ZlPP.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 49, 'service_id' => 10, 'image' => 'b4N3wvBz49NrN0vAjzcFdxSP3RtSzeSnsjwUkF4L.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 50, 'service_id' => 11, 'image' => 'KMHdFOILm9wlUb9eO41RxjpCCOmQADVx69hKBLox.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 51, 'service_id' => 11, 'image' => 'v4GFw87cd4G4wTa0pBpW8UDyDyn3afED33JrxJaZ.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 52, 'service_id' => 11, 'image' => 'IZUuDmxH73TA5lCqCt5FPh82mocfNh0gBHnSBrA4.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 53, 'service_id' => 11, 'image' => 'V2xr6W3APf2PvifzFaOMbVRvdgAU59CGJUti2VMd.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 54, 'service_id' => 11, 'image' => 'OSRuQHcvzuKy6leT8gKtnrQrj1gcJYUfKnOEq6bM.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 55, 'service_id' => 11, 'image' => '5QmWLfltOt3HZ6zhAfH6v9OG83ht0GWgCGTtL3pg.webp', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 56, 'service_id' => 12, 'image' => 'EJCH0pZnt1vCpsOyQmHpbs31WsJCJe2IHiYKgfW8.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 57, 'service_id' => 12, 'image' => 't7hBKwP10ZYMHL82HlO7axGEX170LSwDhrj4F5YJ.avif', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 58, 'service_id' => 12, 'image' => '2Zhc5lRvxH70oLRyJoaclBJQC0lSMonxParKNPkQ.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 59, 'service_id' => 12, 'image' => 'jKk6pLD2YTxuSMOainGhZMXBa2pC16PwEfNXvT5w.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 60, 'service_id' => 12, 'image' => 'Uftl0cnCCkGLm6PMMt4PThGWsAWC85XdH2idt2J3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 61, 'service_id' => 8, 'image' => 'WNKoB1A4Nyq5y27jF1D4JUS1F3HOhk60ZqT0NijR.png', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 62, 'service_id' => 8, 'image' => 'jlUB4x3F55EF75mGsNKRZbmXPSBuQrxsQPBLS9iu.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 63, 'service_id' => 8, 'image' => 'GHcGp5Qphs4JVKIrQjPPQGlfFTktte34wZj1oerG.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 64, 'service_id' => 8, 'image' => 'QaIo4EigeLodEdvAqI0HPVZGhB6whBp0SxZwTEqq.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 65, 'service_id' => 8, 'image' => 'TMin1gVLkiq0OIxKZYv2KawbxY8GIl9DCSXAiEcl.jpg', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($serviceImages as $serviceImage) {
            ServiceImage::create($serviceImage);
        }
    }
}
