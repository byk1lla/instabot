const express = require('express');
const { IgApiClient } = require('instagram-private-api');

const ig = new IgApiClient();
const app = express();

app.use(express.json());

app.post('/follow', async (req, res) => {
    try {
        const insta = req.body.insta;
        const instaUsername = insta.username;
        const instaPassword = insta.password;
        ig.state.generateDevice(instaUsername);
        await ig.account.login(instaUsername, instaPassword);
        const userId = await ig.user.getIdByUsername(req.body.username);
        await ig.friendship.create(userId);
        res.status(200).json({ message: 'Followed user successfully' });
    } catch (error) {
        res.status(500).json({ message: 'Error following user', errorMsg: error });
    }
});

app.post('/login', async (req, res) => {
    try {
        const insta = req.body.insta;
        const instaUsername = insta.username;
        const instaPassword = insta.password;
        ig.state.generateDevice(instaUsername);
        await ig.account.login(instaUsername, instaPassword);
        res.status(200).json({ message: 'Login successful' });
    } catch (error) {
        res.status(500).json({ message: 'Error logging in', errorMsg: error });
    }
});

app.get('/', async (req, res) => {
    res.status(400).json({ message: 'Get requests are not allowed' });
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
