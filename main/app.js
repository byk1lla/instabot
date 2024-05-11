const express = require('express');
const { IgApiClient } = require('instagram-private-api');

const ig = new IgApiClient();
const app = express();

app.use(express.json());

app.post('/follow', async (req, res) => {
   // Coming Soon...
});

app.post('/login', async (req, res) => {
    try {
        const insta = req.body.insta;
        const instaUsername = insta.username;
        const instaPassword = insta.password;
        ig.state.generateDevice(instaUsername);
        await ig.account.login(instaUsername, instaPassword);
        res.status(200).json({Login:1});
    } catch (error) {
        res.status(500).json({Login:0, Error:1, errorMsg:"An Error Occured while Logging in" });
        console.log(error);
    }
});

app.get('/', async (req, res) => {
    res.status(400).json({ errorMsg: 'Get requests are not allowed', error:1 });
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
